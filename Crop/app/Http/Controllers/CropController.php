<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
       // $keyword = $request->all;

        // $formData = $request->all(); // Request object

        print_r($formData);
         var_dump(request('ph'));
        var_dump(request('temperature'));
        var_dump(request('month'));
      //  var_dump(request('image'));
      //  $perPage = 25;
        //return view('waterresource.dashboard');

       
       // return view('cropprediction.croppredictions.create');
    }

   
}
