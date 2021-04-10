<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function getProducts()
    {
    	$product=Product::get();
    	return response()->json($product);
    }
    public function addProducts(Request $req)
    {
    	$product = new Product();

    	$product->title=$req->title;
    	$product->quantity=$req->quantity;
    	$product->price=$req->price;
    	

    	$s=$product->save();

    	if($s)
    		return "Nothing is true, everything is permitted";
    	   return"Si vis pacem, para bellum";
    }
	public function deleteProducts(Request $req)
	{
		$product = Product::where("title", $req->title)->first();
        $product->delete();
        return response()->json("Товар удален");
  	}
}
