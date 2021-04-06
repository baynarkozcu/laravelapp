<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function add(Request $request)
    {
        $stock = new Stock();
        $stock->stokAdedi = $request->stokAdedi;
        $stock->product_id = $request->product_id;
        $stock->silindiMi = 1;
        $stock->save();
        return redirect()->route('stock')
            ->with('message', 'Stok  başarıyla eklendi.');
    }

    public function delete($id)
    {
        $stock = Stock::find($id);
        $stock->silindiMi = 0;
        $stock->save();
        return redirect()->route('stock')
            ->with('message', 'Stok Silindi.');
    }

    public function index()
    {
        $stocks = Stock::where("silindiMi", 1)->get();
        $products = Product::where("silindiMi", 1)->get();
        return view("stock", compact('stocks','products'));
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        return view("updateStock", compact('stock'));
    }

    public function save($id,Request $request)
    {
        $stock = Stock::where('id',$id)->first();
        $stock->stokAdedi = $request->stokAdedi;
        return $stock;
        $stock->update();

        return redirect()->route('stock')
            ->with('message', $request->stokAdedi . ' adlı ürün Güncellendi.');
    }
}
