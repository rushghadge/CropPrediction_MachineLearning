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
$weather = $owm->getWeather('Thane', $units, $lang);
// echo "EXAMPLE 1 Temperature of Thane";
// echo "</br>";

// echo " ".$weather->temperature."  ";
// echo "</br>";

//echo "hi";
$temp= $weather->temperature;


//$ip= \Request::ip();
    $ip='59.153.121.94';

    //$ipaddress = $_SERVER['REMOTE_ADDR'];
  //  print_r("IPADDRESS->".$ip);
    $data = \Location::get($ip);
    $arraydata =  (array) $data;
    // echo "</br>";

    //   //print_r($arraydata);   // displays array content
    //   echo "</br>";
    //   echo "See YOUR latitude and longitude";
    //   echo "</br>";
    //   print_r("Latitude".$arraydata["latitude"]);
    //   echo "</br>";

    //   print_r("Longitude".$arraydata["longitude"]);

      $lat=$arraydata["latitude"];
      $lon=$arraydata["longitude"];

 // $lat=$arraydata["latitude"];
 //      $lon=$arraydata["longitude"];

// Example 4: Get current temperature from coordinates (Greenland :-) ).
$weather = $owm->getWeather(array('lat' => $lat, 'lon' => $lon), $units, $lang);

//$weather = $owm->getWeather(array($lat, $lon), $units, $lang);
        ////echo "$lf$lf EXAMPLE 4$lf";

echo 'Temperature based on your current location: '.$weather->temperature;
echo $lf;

$temp=$weather->temperature;


//return view('weather.dashboard')->with('temp', $temp);
return view('weather.dashboard')->with('temp', $temp);

// return View::make('category.index')->with(compact('category'
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
