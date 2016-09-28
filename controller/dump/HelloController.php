<?php
/**
 * This <sekcv-stroke.esy.es> project created by :
 * Name         : syafiq
 * Date / Time  : 28 September 2016, 7:18 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace controller\dump;
use model\util\Logger;
use Pux;

include_once __DIR__.'/../../model/util/Logger.php';

class HelloController extends Pux\Controller
{
    private $logger;

    public function __construct()
    {
        $this->logger = Logger::getInstance();
        $this->logger->addDebug("controller\\dump\\HellosController\\__construct");
    }

    public function indexAction()
    {
        $this->logger->addDebug("controller\\dump\\HellosController\\index");
    }

    public function addAction()
    {
        $this->logger->addDebug("controller\\dump\\HellosController\\add");
    }
}