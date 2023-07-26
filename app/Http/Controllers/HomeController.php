<?php

namespace App\Http\Controllers;

use Stripe\Charge;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
       
    }
   
   public function redirect(){
    // dd('hi');
    $usertype=Auth()->user()->usertype;
    
    if($usertype=='1'){
        $total_product=Product::all()->count();
        $total_order=Order::all()->count();
        $total_user=User::all()->count();
        $order=Order::all();
        $total_revenue=0;
        foreach($order as $order){
            $total_revenue=$total_revenue + $order->price;  
        }

        $total_deliverd=Order::where('delivery_status','=','delivered')->get()->count();
        $total_processing=Order::where('delivery_status','=','processing')->get()->count();



        return view('admin.home', compact('total_product','total_order','total_user','total_revenue','total_deliverd','total_processing'));
    }
    else if($usertype=='0'){
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }
   }

   public function product_details($id){
    $products=Product::find($id);
    return view('home.product_details', compact('products'));
   }

   public function add_cart(Request $request, $id){
    if(Auth::id()){
        $user=Auth::user();
        $products=Product::find($id);
        $cart=New Cart;
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;

        $cart->product_title=$products->name;
        if($products->discount_price!=null){
            $cart->price=$products->discount_price * $request->quantity;     
        }else{
            $cart->price=$products->price * $request->quantity;
        }
        
        $cart->quantity=$request->quantity;
        $cart->image=$products->image;
        $cart->product_id=$products->id;

        $cart->save();
        return redirect()->back();
    }else{
        return redirect('login');
    }


    // $products=Product::find($id);
    // return view('home.product_details', compact('products'));
   }

   public function show_cart(){
    if(Auth::id()){
        $id=Auth::user()->id;
        $cart=Cart::where('user_id','=',$id)->get();
        return view('home.show_cart', compact('cart'));
    }else{
        return redirect('login');
    }
    
   }

   public function remove_cart($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
   }

   public function cash_order(){
    $user=Auth::user();
    $userid=$user->id;
    $data=Cart::where('user_id', '=',$userid)->get();
    foreach($data as $data){
        $order=new Order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;

        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;
       
        $order->payment_status='cash on delivery';
        $order->delivery_status='processing';

        $order->save();

        $cart_id=$data->id;
        $cart=Cart::find($cart_id);
        $cart->delete();


    }
        return redirect()->back()->with('message', 'We Have Recieved Your order. We Will Connect with you Soon...');
}

    public function stripe($totalprice){
    return view('home.stripe', compact('totalprice'));
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request,$totalprice)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Charge::create ([
                "amount" => $totalprice  * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment" 
        ]);

        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id', '=',$userid)->get();
        foreach($data as $data){
            $order=new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
    
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
           
            $order->payment_status='Paid';
            $order->delivery_status='processing';
    
            $order->save();
    
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
    
    
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

}
