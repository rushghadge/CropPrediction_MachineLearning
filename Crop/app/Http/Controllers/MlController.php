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



//namespace Phpml\Tests\Metric;

use Phpml\Classification\SVC;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Dataset\Demo\IrisDataset;
use Phpml\Exception\InvalidArgumentException;
//use Phpml\Metric\Accuracy;
//use Phpml\SupportVectorMachine\Kernel;
//use PHPUnit\Framework\TestCase;
class MlController extends KNearestNeighbors
{
   

public function index()
    {

$dataset = new CropDataset();
// print_r("############getSamples############## ");

//print_r($dataset->getSamples());
$dataset->getTargets();
// print_r("############getSamples############## ");

// print_r("############getTargets############## ");

//print_r($dataset->getTargets());

$classifier = new KNearestNeighbors($k=5, new Minkowski($lambda=10));

$classifier = new KNearestNeighbors();
$classifier->train($samples =$dataset->getSamples() , $dataset->getTargets());

//   KNearestNeighbors
        $predicted = (array) $classifier->predict($dataset->getSamples());
//print_r($predicted);
print_r("KNearestNeighbors ");
print_r($classifier->predict([8.2,28,10]));
//$predictedLabels = (array)$classifier->predict([6.5, 22]);
  print_r("Accuracy: ". $accuracy = Accuracy::score($dataset->getTargets(), $predicted) );

print_r("########################## ");

//Accuracy::score($dataset->getTargets() ,(array) $classifier->predict([6.5, 22]),false);


//   NaiveBayes

$classifierNB = new NaiveBayes();
$classifierNB->train($samples =$dataset->getSamples() , $dataset->getTargets());


print_r("NaiveBayes    ");
print_r($classifierNB->predict([8.2,28,10]));
       $predicted = (array) $classifierNB->predict($dataset->getSamples());

        print_r("A: ". Accuracy::score($dataset->getTargets(), $predicted));




print_r("###########SVC##Kernel::RBF############# ");
 //$dataset = new RandomSplit(new IrisDataset(), 0.5, 123);
 $classifier = new SVC(Kernel::RBF);
$classifier->train($samples =$dataset->getSamples() , $dataset->getTargets());
print_r($classifierNB->predict([8.2,28,10]));

        $predicted = (array) $classifier->predict($dataset->getSamples());

       print_r("Accuracy SVCRBF: ". $accuracy = Accuracy::score($dataset->getTargets(), $predicted) );


/*
print_r("###########SVC##Kernel::LINEAR############# ");

$classifierSV = new SVC(Kernel::LINEAR, $cost = 100);
print_r($classifierSV->predict([6.5,22]));

$classifierSV->train($samples =$dataset->getSamples() , $dataset->getTargets());
$predicted = (array) $classifier->predict($dataset->getSamples());

print_r("Accuracy SVC##Kernel::LINEAR: ". $accuracy = Accuracy::score($dataset->getTargets(), $predicted) );
*/


    }

}
