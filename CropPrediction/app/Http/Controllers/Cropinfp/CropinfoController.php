<?php

namespace App\Http\Controllers\Cropinfp;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;
use Illuminate\Http\Request;

class CropinfoController extends Controller
{
   
/**
 * OpenWeatherMap-PHP-API — A php api to parse weather data from http://www.OpenWeatherMap.org .
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following links to read about the usage policies and the license of
 * OpenWeatherMap before using this class:
 *
 * @see http://www.OpenWeatherMap.org
 * @see http://www.OpenWeatherMap.org/terms
 * @see http://openweathermap.org/appid
 */

//require_once __DIR__ . '/bootstrap.php';
public function index()
    {

//return view('weather.dashboard')->with('temp', $temp);
return view('cropinfo.dashboard');



}

}
