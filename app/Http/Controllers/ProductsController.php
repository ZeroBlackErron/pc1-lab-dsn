<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('user')) {
            $user = Session::get('user');
            $products = Product::all();
            return view('products.list')->with(compact('user', 'products'));
        }else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('user')) {
            $user = Session::get('user');
            return view('products.create')->with(compact('user'));
        }else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newProduct = new Product;

        $newProduct->name = $request->input('name');
        $newProduct->cost = $request->input('cost');
        $newProduct->id_category = $request->input('id_category');
        $newProduct->stock = $request->input('stock');

        $newProduct->save();

        return redirect()->route('list.products');
    }

    public function search(Request $request)
    {
        $filter = $request->input('slug');
        if(is_numeric($filter)) {
            $product = Product::find($filter);
            if($product != null){
                return redirect()->route('show.product', $product->id);
            }else {
                return redirect()->route('list.products');
            }
        }else if(is_string($filter)){
            $product = Product::where('name', $filter)->get();
            if(count($product) != 0){
                return redirect()->route('show.product', $product[0]->id);
            }else {
                return redirect()->route('list.products');
            }
        }else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Session::has('user')) {
            $user = Session::get('user');
            $productDetails = Product::find($id);
            return view('products.show')->with(compact('user',  'productDetails'));
        }else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::has('user')) {
            $user = Session::get('user');
            $product = Product::find($id);
            return view('products.edit')->with(compact('user', 'product'));
        }else {
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldProduct = Product::find($id);

        $oldProduct->name = $request->input('name');
        $oldProduct->cost = $request->input('cost');
        $oldProduct->id_category = $request->input('id_category');
        $oldProduct->stock = $request->input('stock');

        $oldProduct->update();

        return redirect()->route('list.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete($product->id);

        return redirect()->route('list.products');
    }
}
