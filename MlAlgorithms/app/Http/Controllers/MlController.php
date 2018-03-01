<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//namespace PhpmlExamples;
use Phpml\Classification\NaiveBayes;

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
   

public function index()
    {

$dataset = new CropDataset();
$dataset->getSamples();
$dataset->getTargets();

$classifier = new KNearestNeighbors($k=5, new Minkowski($lambda=10));

$classifier = new KNearestNeighbors();
$classifier->train($samples =$dataset->getSamples() , $dataset->getTargets());

//   KNearestNeighbors

print_r("KNearestNeighbors ");
print_r($classifier->predict([6.5, 22]));

print_r("########################## ");



//   NaiveBayes

$classifierNB = new NaiveBayes();
$classifierNB->train($samples =$dataset->getSamples() , $dataset->getTargets());


print_r("NaiveBayes    ");
print_r($classifierNB->predict([6.5,22]));


    }

}
