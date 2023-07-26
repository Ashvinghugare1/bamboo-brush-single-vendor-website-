<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
use Notification;
use App\Notifications\MyFirstNotification;    

class AdminController extends Controller
{
    public function view_category(){
        $data=Category::latest()->paginate(10);
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data=new Category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category added Successfully');
    }

    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted successfully.');
    }

    public function order(){
        $order=Order::latest()->paginate(10);
        return view('admin.order', compact('order'));
    }

    public function delivered($id){

        $order=Order::find($id);
        $order->delivery_status="Delivered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back();
    }

    public function print_pdf($id){
        $order=Order::find($id);
        $pdf=PDF::loadview('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id){
        $order=Order::find($id);
        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id){
        $order=Order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order, new MyFirstNotification($details));
        return redirect()->back();
    }

    public function searchdata(Request $request){
        $searchText=$request->search;
        $order=Order::where('name','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->get();
        return view('admin.order', compact('order'));
    }
}


