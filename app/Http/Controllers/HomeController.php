<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
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
        return view('admin.home');
    }
    else if($usertype=='0'){
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }
   }
}
