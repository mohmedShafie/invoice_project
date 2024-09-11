<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Bill;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product()
    {
        return view('product.add_product');
    }
    public function insert_product(Request $req)
    {
        $data = Product::create([
            'product_name'=>$req->name,
            'price'=>$req->price,
        ]);
        if($data){
            return redirect()->back()->with('success','Data Inserted Successfully!');
    }
}
public function show_product(){
$product = Product::all();

return view('bill.add_bill' , compact('product'));
}
public function delete_product_from_bill($id)
{
    $delete_product_from_bill = Bill::where('product_id' , $id)->delete();
    if($delete_product_from_bill){
        return redirect()->back()->with('success','Data Deleted Successfully!');
    }
}
public function edit_product()
{
    return view('product.edit_product');
}
public function update_product(Request $request)
{
    $products = Product::where('product_name' , $request->product_name)->get();
    return view('product.update_product' , compact('products'));
}
public function insert_updated_product(Request $request , $id)
{
    $update_product = Product::where('id' , $id)->update([
        'product_name'=>$request->product_name,
        'price'=>$request->price,
    ]);
    if($update_product){
        return view('product.edit_product')->with('messege','Data Updated Successfully!');
    }
}
public function delete_product(Request $request)
{
    Bill::where('product_name' , $request->product_name)->delete();
    $delete_product = Product::where('product_name' , $request->product_name)->delete();
    if($delete_product){
        return view('home.index')->with('messege','Data Deleted Successfully!');
    }
}
}