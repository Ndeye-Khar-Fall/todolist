<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;

class ProductController extends Controller
{
   public function index()
   {
       $products=Product::with('category')->get();
       return view('welcome',compact('products'));
   }

   public function create()
   {
       $categories=category::all();
       return view('products.create',compact('categories'));
   }

   public function store(Request $request)
   {
        $request->validate([
            'title'=>'required|min:3',
            'price'=>'required'
        ]);    

        $input = $request->all();
        $product=new Product();
        $product->title =$request->title;
        $product->price =$request->price;
        $product->category_id =$request->category_id;
        if($request->hasFile('image'))
        {
            $destination_path= 'public/images/products';
            $image= $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path=$request->file('image')->storeAs($destination_path,$image_name);

            $input['image']=$image_name;
        }

      $product->save();
       session()->flash('message', $input['title'].' succesfully saved');
       return redirect('/');
   }

   public function edit($product)
   {
    $categories = Category::all();
    $product = Product::find($product);
    return view('products.edit',compact('product', 'categories'));
        
   }
   public function update(Request $request, $product)
   {
       $input = $request->all();

       $product = Product::find($product);
       $product->title =$input['title'];
       $product->price =$input['price'];
       $product->category_id=$input['category_id'];

       $product->save();
       session()->flash('message', $input['title'].' succesfully updated');
       return redirect('/');
   }

   public function delete($product)
   {
    Product::find($product)->delete();
    session()->flash('message', 'product succesfully deleted');

    return redirect()->back();
   }
   public function search()
   {
       $search_text=$_GET['query'];
       $products= Product::where('title','LIKE','%'.$search_text.'%')->with('category')->get();
       return view('products.search',compact('products'));
   }
}
