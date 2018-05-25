<?php
declare(strict_types=1);

namespace App\Http\Controllers;

//namespace PhpmlExamples;
use Phpml\Classification\NaiveBayes;
use View;

//namespace Phpml\Classification\DecisionTree;
use Phpml\Dataset\Demo\CropDataset;
use Phpml\Math\Distance;
use Phpml\Math\Distance\Minkowski;
//namespace Phpml\Classification;

use Phpml\Helper\Predictable;
use Phpml\Helper\Trainable;
//use Phpml\Math\Distance;
use Phpml\Math\Distance\Euclidean;
use Phpml\Tests\Classification;

use Phpml\Classification\KNearestNeighbors;
use Phpml\ModelManager;
use PHPUnit\Framework\TestCase;
use Phpml\CrossValidation\StratifiedRandomSplit;
use Phpml\Dataset\Demo\WineDataset;
use Phpml\Metric\Accuracy;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Phpml\Classification\SVC;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Dataset\Demo\IrisDataset;
use Phpml\Exception\InvalidArgumentException;
use App\Cropprediction;
use Illuminate\Http\Request;

class CroppredictionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->all;
        print_r($keyword);
        $perPage = 25;

       
        return view('cropprediction.croppredictions.create');
    }

     public function store(Request $request)
    {

         $formData = $request->all(); // Request object


            $ph= $formData['ph'];
            $temp= $formData['temperature'];
            $mth= $formData['month'];
       

$dataset = new CropDataset();
// print_r("############getSamples############## ");

//print_r($dataset->getSamples());
$dataset->getTargets();
// print_r("############getSamples############## ");

// print_r("############getTargets############## ");

//print_r($dataset->getTargets());



//print_r("###########SVC##Kernel::RBF############# ");
 //$dataset = new RandomSplit(new IrisDataset(), 0.5, 123);
 $classifierS = new SVC(Kernel::RBF);
$classifierS->train($samples =$dataset->getSamples() , $dataset->getTargets());
//print_r($classifierS->predict([$ph,$temp,$mth]));
$c1=$classifierS->predict([$ph,$temp,$mth]);   //predict 



//print_r("KNearestNeighbors ");
$classifierk = new KNearestNeighbors($k=5, new Minkowski($lambda=10));

$classifierk = new KNearestNeighbors();
$classifierk->train($samples =$dataset->getSamples() , $dataset->getTargets());


//print_r($classifierk->predict([$ph,$temp,$mth])); // predict
$c2=$classifierk->predict([$ph,$temp,$mth]);   //predict 

//print_r("########################## ");

$classifierNB = new NaiveBayes();
$classifierNB->train($samples =$dataset->getSamples() , $dataset->getTargets());


//print_r("NaiveBayes    ");
//print_r($classifierNB->predict([$ph,$temp,$mth]));
$c3=$classifierNB->predict([$ph,$temp,$mth]);   //predict 
// $permissions=array($c1,$c2,$c3);
//print_r($permissions);



// $data = array(
//     'c1'  => $c1,
//     'c2' => $c2,
//     'c3' => $c3
// );

return View::make('cropprediction.data')->with(['c1' =>$c1, 'c2' => $c2,'c3' => $c3]); 
//return View::make('cropprediction.data')->with(['c1' =>$c1, 'c2' => $c2]);
  //   return view('cropprediction.data',compact('permissions'));


    }

    
}
