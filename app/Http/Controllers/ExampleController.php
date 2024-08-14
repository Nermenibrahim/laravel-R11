<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function uploadForm(){
        return view('Upload');
    }


    public function upload(Request $request){

        $file_extension = $request->image->getClientOriginalExtension();

        $file_name = time() . '.' . $file_extension;

        $path = 'assets/images';

        $request->image->move($path, $file_name);

        return 'Uploaded';

    }


    public function index()
    {
        

        return view('about' );
    }


    public function test()
    {
        

        dd(Student::find(4)?->phone->phone_number)   ;
 }
   

}
