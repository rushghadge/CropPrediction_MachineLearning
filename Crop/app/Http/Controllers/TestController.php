<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Charts;


class TestController extends Controller
{
    public function index(){
    	$chart = Charts::multi('bar', 'material')
            // Setup the chart settings
            ->title("मुख्य पिकांचे उत्पादन आणि उत्पन्न")
            // A dimension of 0 means it will take 100% of the space
            ->dimensions(800, 400) // Width x Height
            // This defines a preset of colors already done:)
            ->template("material")
            // You could always set them manually
            // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // Setup the diferent datasets (this is a multi chart)
            ->dataset('2013-14', [2416,3145,1717,764,2120,1168,510,2512])
            ->dataset('2014-15', [2391,2750,1703,728,2028,1075,462,2473])
            ->dataset('2015-16', [2404,3093,1596,652,2056,968,432,2399])
            // Setup what the values mean
            ->labels(['भात', 'गहू', 'तृणधान्ये','कडधान्य','अन्नधान्य','तेलबिया','कापूस','ज्यूट']);

       // return view('test', ['chart' => $chart]);
        return view('cropinfoPYield.dashboard', ['chart' => $chart]);
    }}
