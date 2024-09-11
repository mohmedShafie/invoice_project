<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function add_user(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
        ]);
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        $product = Product::all();
        if($user){
        return view('bill.insert_bill'  , compact('product'));


        };
    }
    public function show_user_bill($id)
    {
        $user_bills = Bill::where('user_id' ,'=' ,  $id)->get();
        return view('user.show_user_bill' , compact('user_bills'));
    }
    public function retrive_user(Request $request)
{
    $user_id = $request->id;
    $users = User::select('name' , 'id')->where('id' , '=' ,$user_id)->get();
    if($users){        
        return view('user.retrive_user' , compact('users'));
    }
    else{
        return redirect()->back()->with('messege' , 'لايوجد مستخدم بهذا الاسم برجاء المحاولة مرة اخري');
    }

}
public function delete_user($id)
{
     Bill::where('user_id' , $id)->delete();
    $user= User::where('id' , $id)->delete();
        return view('bill.old_bill')->with('messege' , 'تم حذف المستخدم بنجاح ');
}
}
