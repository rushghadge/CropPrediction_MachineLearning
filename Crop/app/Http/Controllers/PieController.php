<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Charts;


class PieController extends Controller
{
    public function index(){
    	$chart=Charts::create('pie', 'highcharts')
    ->title('एकूण उत्पादनाद्वारे जिल्हानिहाय हिस्सा')
    ->labels(['अमरवत', 'अहमदनगर', 'अकल','हिंगोली','वशम','बलढण','लतर','उसमनबद','नगपर','जळगव','नदड','इतर जलह'])
    ->values([8,7,7,6,5,5,5,5,5,5,4,38])
    ->dimensions(600,500)
    ->responsive(false);

        return view('cropinfo.dashboard', ['chart' => $chart]);
    }}
