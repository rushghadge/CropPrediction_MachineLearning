<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//namespace PhpmlExamples;

//namespace Phpml\Classification\DecisionTree;

use Phpml\Math\Comparison;


use Phpml\Tests\Classification;

use Phpml\Classification\NaiveBayes;
use Phpml\ModelManager;
use PHPUnit\Framework\TestCase;
use Phpml\CrossValidation\StratifiedRandomSplit;
use Phpml\Dataset\Demo\WineDataset;
use Phpml\Metric\Accuracy;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;
class MlController extends Controller
{
   

//require_once __DIR__ . '/bootstrap.php';
public function index()
    {


$samples = [[5.5,22], [8, 32], [6,35]];
$labels = ['apple', 'appricot', 'banana'];


$classifier = new NaiveBayes();
$classifier->train($samples, $labels);


$classifier->predict([6,35]);
print_r("Hello");
print_r($classifier->predict([8,22.5]));die();
 //return'a

//$classifier->predict([[3, 1, 1], [1, 4, 1]);
// return ['a', 'b']
    }

}
