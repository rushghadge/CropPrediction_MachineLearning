<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Charts;


class WaterController extends Controller
{
    public function index(){
    	

        return view('waterresource.dashboard');
    }}
