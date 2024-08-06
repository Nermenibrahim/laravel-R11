<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Common;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::latest()->take(3)->get(); ;

        return view('index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([

            'title' => 'required|alpha:ascii',
            'price' => 'required|numeric',
            'description' => 'required|string|max:200',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            
    
    
           ]);

           
            
            $data['image'] = $this->uploadFile($request->image, 'assets/images');

           
       

          
            

           
        



        Product::create($data);
        return redirect()->route('products.index');


           

           
        



        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
