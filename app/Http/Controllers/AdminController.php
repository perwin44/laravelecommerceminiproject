<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function product(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                return view('admin.product');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function upload_product(Request $request){
        $data=new Product;

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;

        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->save();
        return redirect()->back()->with('message','Product Added Successfully!');
    }

    public function show_product(){
        $data=Product::all();
        return view('admin.show_product',compact('data'));
    }

    public function delete_product($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted Successfully!');
    }

    public function update_view($id){
        $data=Product::find($id);
        return view('admin.update_view',compact('data'));
    }

    public function update_product(Request $request,$id){
        $data=Product::find($id);

        $image=$request->file;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;
    }

        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->save();
        return redirect()->back()->with('message','Product Updated Successfully!');
    }

    public function show_order(){
        $order=Order::all();
        return view('admin.show_order',compact('order'));
    }

    public function update_status($id){
        $order=Order::find($id);
        $order->status='delivered';
        $order->save();
        return redirect()->back()->with('message','Product Delivered Successfully!');
    }
}
