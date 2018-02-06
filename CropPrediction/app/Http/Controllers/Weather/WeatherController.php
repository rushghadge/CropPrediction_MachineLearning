<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception;

class WeatherController extends Controller
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
$cli = false;
$lf = '<br>';
if (php_sapi_name() === 'cli') {
    $lf = "\n";
    $cli = true;
}

// Language of data (try your own language here!):
$lang = 'de';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'metric';

// Get OpenWeatherMap object. Don't use caching (take a look into Example_Cache.php to see how it works).
$owm = new OpenWeatherMap();
$myApiKey ='b664e15807936d8854bdaf1c5f6393a0';
$owm->setApiKey($myApiKey);

// Example 1: Get current temperature in Berlin.
$weather = $owm->getWeather('Berlin', $units, $lang);
echo "EXAMPLE 1$lf";

// $weather contains all available weather information for Berlin.
// Let's get the temperature:

// Returns it as formatted string (using __toString()):
echo "1".$weather->temperature."1 ";
echo "---2".$lf."2---";
echo "hi";
$temp= $weather->temperature;
//return view('weather.dashboard')->with('temp', $temp);
return view('weather.dashboard',compact($temp));
//return view('weather.dashboard',compact($weather));
// Returns it as formatted string (using a method):
echo "---3".$weather->temperature->getFormatted()."3---";
echo $lf;

// Returns the value only:
echo $weather->temperature->getValue();
//return view('weather.dashboard',compact($weather->temperature->getValue()));

//echo $lf;


}

}
