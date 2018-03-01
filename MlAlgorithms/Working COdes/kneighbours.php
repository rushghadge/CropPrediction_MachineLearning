<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//namespace PhpmlExamples;

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

class MlController extends KNearestNeighbors
{
   

//require_once __DIR__ . '/bootstrap.php';
public function index()
    {

$dataset = new CropDataset();
$dataset->getSamples();
$dataset->getTargets();
//$classifier = new KNearestNeighbors($k=5);
$classifier = new KNearestNeighbors($k=5, new Minkowski($lambda=10));
// $samples = [[5.5,22], [8, 32], [6,35]];
// $labels = ['apple', 'appricot', 'banana'];
/*
$samples = [[5.5,22],[6,23],[6.5,24], [6,35],[5.5,25],  [6.5, 16],  [4, 10]];
$labels = ['apple','apple','apple', 'banana','banana', 'appricot', 'betel_nut'];
*/
$classifier = new KNearestNeighbors();
$classifier->train($samples =$dataset->getSamples() , $dataset->getTargets());




//$classifier->predict([6,35]);
print_r("Hello ");
print_r($classifier->predict([8, 25]));die();
 //return'a

//$classifier->predict([[3, 1, 1], [1, 4, 1]);
// return ['a', 'b']
    }

}
