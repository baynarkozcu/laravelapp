<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        $data['products'] = Product::all()->where("silindiMi", 1);
        return view("product" , $data);
    }

    public function add(Request $request)
    {
        $product = new Product();
        $product->ad = $request->ad;
        $product->silindiMi = 1;

        $product->save();
        return redirect()->route('product')
            ->with('message','Ürün  başarıyla eklendi.');
    }

    public function delete($id){


        DB::table("products")->where("UUID",$id)->update(['silindiMi' => 0]);
        return redirect()->route('product')
            ->with('message','Ürün Silindi.');

    }




    public function edit($id){

        $product = DB::table("products")->where("UUID",$id)->get();

        $product=Product::find($id);
        $data['product'] = $product;
        return view("updateProduct" , $data);
    }


    public function save(Request $request){
        $product=Product::find($request->id);
        $product->ad = $request->ad;
        $product->save();

        return redirect()->route('product')
            ->with('message',$request->ad .' adlı ürün Güncellendi.');
    }
}
