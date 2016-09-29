<?php

/**
 * This <sekcv-stroke.esy.es> project created by :
 * Name         : syafiq
 * Date / Time  : 18 September 2016, 6:25 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
namespace model\util;

require __DIR__.'/../../vendor/autoload.php'; // use PCRE patterns you need Pux\PatternCompiler class.
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;

class Logger
{
    private static $instance;
    private $logger;

    /**
     * Logger constructor.
     */
    private function __construct()
    {
        $dateFormat = "Y-m-d H:i:s";
        $output = "[%datetime%] %channel%.%level_name%: %message%\n";
        $formatter = new LineFormatter($output, $dateFormat);

        // Create the logger
        $this->logger = new MonologLogger('debug');

        // Now add some handlers
        $stream = new ChromePHPHandler();
        $this->logger->pushHandler($stream);

        $stream = new StreamHandler(__DIR__ . '/../../my_app.log', MonologLogger::DEBUG);
        $stream->setFormatter($formatter);
        $this->logger->pushHandler($stream);
        $this->logger->addInfo('Logger.__construct');
    }

    /**
     * @return MonologLogger
     */
    public function getLogger()
    {
        $this->logger->addInfo('Logger.getLogger');

        return $this->logger;
    }

    /**
     * @return MonologLogger
     */
    public static function getInstance()
    {
        if(Logger::$instance == null)
        {
            Logger::$instance = new Logger();
        }
        return Logger::$instance->getLogger();
    }
}