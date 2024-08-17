<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CarController extends Controller
{

    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();

        return view('cars' , compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->get();
    
        return view('add_car', compact('categories'));
    }


   

   


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        

       $data = $request->validate([

        'carTitle' => 'required|string',
        'description' => 'required|string|max:200',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        


       ]);

       //dd($request);

      
     
       
       

        $data['image'] = $this->uploadFile($request->image, 'assets/images/cars');

        $data['published'] = isset($request->published) ;

       //dd($data);
        

        Car::create($data);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $car = Car::with('category')->findOrFail($id);

        return view('car-detail' , compact('car'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $car = Car::findOrFail($id);
        $categories = Category::select('id', 'category_name')->get();
        
        return view('edit_car' , compact('car',('categories')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       
      
        $data = $request->validate([

            'carTitle' => 'required|string',
            'description' => 'required|string|max:200',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            
    
    
           ]);
           
          // dd($request->all());





           if($request->hasFile(('image'))){
            
            $data['image'] = $this->uploadFile($request->image, 'assets/images/cars');

           }
           
            $data['published'] = isset($request->published) ;
            
           Car::where('id',$id)->update($data);
           
           return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        return redirect()->route('cars.index');

    }

    public function showDeleted()
    {
       
        $cars = Car::onlyTrashed()->get();

        return view('trashed', compact('cars') );

    }


    public function restore(string $id)
    {
        Car::where('id',$id)->restore();
        return redirect()->route('cars.showDeleted');

    }


    public function forceDelete(string $id)
    {
        Car::where('id',$id)->forceDelete();
        return redirect()->route('cars.index');

    }
   

}





