<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Bill;
use  App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as PDF;



class BillController extends Controller
{
    public function add_bill()
    {
        return view('bill.add_bill');
    }
    // public function search(Request  $request)
    // {
    //     $output = "";
    // $search_product = Product::where('product_name' , 'like' ,'%'.$request->search.'%')->get();
    // foreach($search_product as $search_product){
    //     $output.= '<tr> 
    //     <td> # </td>
    //     <td>'.$search_product->product_name.'</td>
    //     <td>'.$search_product->price.'</td>
    //     <td>
    //         <form action="'.url('add_product_bill',$search_product->id).'" method="get">
             
    //             <input type="text" class="form-control" id="quantity" name="quantity">
    //             <button type="submit" class="btn btn-primary">أضافة</button>
    //         </form>
    //     </td>
    // </tr>';
    // }
    // return response($output);
    // }
    public function search(Request $request)
{
    $output = "";
    $search_product = Product::where('product_name', 'like', '%' . $request->search . '%')->get();

    foreach ($search_product as $product) {
        $output .= '<tr>
            <td>#</td>
            <td>' . $product->product_name . '</td>
            <td>' . $product->price . '</td>
            <td>
                <form action="' . url('add_product_bill', $product->id) . '" method="get">
                    ' . csrf_field() . '
                    <input type="text" class="form-control" id="quantity" name="quantity">
                    <button type="submit" class="btn btn-primary">أضافة</button>
                </form>
            </td>
        </tr>';
    }

    return response($output);
}

     public function add_product_bill(Request $request)
     {
       $product = Product::select('product_name')->where('id' , $request->product_id)->first();
       $price = Product::select('price')->where('id' , $request->product_id)->first();

     $billData = [
        'product_id' => $request->product_id,
        'product_name' => $product->product_name,
        'quantity' => $request->quantity,
        'user_id' => Session::get('user_id'),
        'product_price' => $price->price,
    ];
       $bill_data = Bill::create($billData);
       if($bill_data){
        Session::push('products', [
            'product_id' => $request->product_id,
            'product_name' => $product->product_name,
            'price' => $price->price,
            'quantity' => $request->quantity,
            'user_id' => Session::get('user_id'),
        ]);
       return view('bill.insert_bill');
    }
}
public function old_bill()
{
    return view('bill.old_bill');
}
public function print_pdf($id)
{
    $user_bill = Bill::where('user_id' , $id)->get();
    $user = User::where('id' , $id)->first();
    $user_name = $user->name;
    // $pdf =  PDF::loadView('bill.print_bill', compact('user_bill' , 'id'));
    // return $pdf->stream('document.pdf');
$html = view('bill.print_bill', compact('user_bill' , 'id' ,'user_name'))->toArabicHTML();
$pdf = PDF::loadHTML($html)->output();
$headers = array(
    "Content-type" => "application/pdf",
);

// Create a stream response as a file download
return response()->streamDownload(
    fn () => print($pdf), // add the content to the stream
    "invoice.pdf", // the name of the file/stream
    $headers
);
}
}
