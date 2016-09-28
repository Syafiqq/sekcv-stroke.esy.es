<?php
/**
 * This <sekcv-stroke.esy.es> project created by :
 * Name         : syafiq
 * Date / Time  : 27 September 2016, 10:48 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

require 'vendor/autoload.php';
include_once 'controller/dump/HelloController.php';
include_once 'model/util/Logger.php';

use model\util\Logger;
use Pux\Executor;
use Pux\Mux;


$mux = new Mux;
$mux->any('/hello/add', ['controller\dump\HelloController', 'addAction']);


$logger = Logger::getInstance();
$logger->addDebug($serverPath = $_SERVER['PATH_INFO']);

$route = $mux->dispatch($serverPath);
if($route != null)
{
    Executor::execute($route);
}
