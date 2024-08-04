<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::get();

        return view('classes' , compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       

       

       
            
        $data = $request->validate([

            'className' => 'required|alpha_num:ascii',
            'capacity' => 'required|numeric',
            'price' => 'required|numeric',
            'time1' => 'required',
            'time2' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            
    
    
           ]);

           if($file = $request->file('image')){
            $name = $file->getClientOriginalName();
            if($file->move('assets/images',$name)){
                $data['image']= $name;
               
            };
        }
       

          
            $data['fulled'] = isset($request->fulled) ;

           
        //dd($data);



        Classe::create($data);
        return redirect()->route('classes.index');


           

           
        



          

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $class =  Classe::findOrFail($id);

     return view('class-detail' , compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classe::findOrFail($id);
        return view('edit_class' , compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = $request->validate([

            'className' => 'required|alpha_num:ascii',
            'capacity' => 'required|numeric',
            'price' => 'required|numeric',
            'time1' => 'required',
            'time2' => 'required',
            
    
    
           ]);

           $data['fulled'] = isset($request->fulled) ;

           //dd($data);

           Classe::where('id',$id)->update($data);

           return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Classe::where('id',$id)->delete();
        return redirect()->route('classes.index');
       
    }


    public function showDeleted()
    {
       
        $classes = Classe::onlyTrashed()->get();

        return view('trashed-classes', compact('classes') );

    }


    public function restore(string $id)
    {
        Classe::where('id',$id)->restore();
        return redirect()->route('classes.showDeleted');

    }


    public function forceDelete(string $id)
    {
        Classe::where('id',$id)->forceDelete();
        return redirect()->route('classes.index');

    }


  




}
