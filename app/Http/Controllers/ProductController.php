<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use Session;

class productController extends Controller
{
    public function add(){
        $r=request(); // get value from input text. Add product 
        // $r request will receive anything submit from the form.

        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([
            'CategoryID'=>$r->categoryID,
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'price'=>$r->productPrice,
            'quantity'=>$r->productQuantity,
            'image'=>$imageName,
        ]);
        Session::flash('success',"Product create successfully!");
        return redirect()->route('viewProduct');
    }

    public function view(){
        /* $viewProduct=Product::all(); */

        $viewProduct=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->select('products.*','categories.name as categoryID')
        ->get();

        return view('showProduct')->with('products',$viewProduct);
    }

    public function edit($id){
        $products=Product::all()->where('id',$id);
        return view('editProduct')->with('products',$products)
                                  ->with('categoryID', Category::all());
    }

    public function update(){
        $r=request(); // get value from input text. Add product 
        // $r request will receive anything submit from the form.
        $products=Product::find($r->id);


        if($r->file('productImage')!= ''){
            $image=$r->file('productImage');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $products->image=$imageName;
        }

        $products->name=$r->productName;
        $products->description=$r->productDescription;
        $products->price=$r->productPrice;
        $products->quantity=$r->productQuantity;
        $products->CategoryID=$r->categoryID;
        $products->save();
        
        Session::flash('success',"Product update successfully!");
        return redirect()->route('viewProduct');
    }

    public function delete($id){
        $deleteProducts=Product::find($id);
        $deleteProducts->delete();
         Session::flash('success',"Product delete successfully!");
        return redirect()->route('viewProduct');
    }

    public function productdetail($id){
        $products=Product::all()->where('id',$id);
        return view('productDetail')->with('products',$products);
    }

    public function viewProduct(){
        (new CartController)->cartItem();
        $products=Product::all();
        return view('viewProducts')->with('products',$products);
    }

    public function phone(){
        /*$phone=Product::all()->where('CategoryID','1');*/
        $products=DB::table('products')->where('CategoryID','=','1')->get();
        return view('viewProducts')->with('products',$products);
    }

    public function computer(){
        /*$computer=Product::all()->where('CategoryID','2');*/
        $products=DB::table('products')->where('CategoryID','=','2')->get();
        return view('viewProducts')->with('products',$products);
    }

    public function searchProduct(){
        $r=request();
        $keyword=$r->keyword;
        $products=DB::table('products')->where('name','like','%'.$keyword.'%')->orWhere('CategoryID','=','3')->get();
        return view('viewProducts')->with('products',$products);
    }

}