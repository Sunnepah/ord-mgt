<?php

namespace Application\Libraries\Utils;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ConsoleLogger
{
    public $logger;

    public function __construct($logName)
    {
        $this->logger = new Logger($logName);

        $output = "[%datetime%] %channel%.%level_name%: %message%\n";
        $formatter = new LineFormatter($output);
        $streamHandler = new StreamHandler('php://stdout', Logger::DEBUG);
        $streamHandler->setFormatter($formatter);
        $this->logger->pushHandler($streamHandler);
    }

    public function getLogger() {
        return $this->logger;
    }
}