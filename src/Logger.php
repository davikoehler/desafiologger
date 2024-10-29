<?php

namespace Mylog;

use Exception;
use Mylog\Contracts\FileLoggerInterface;
use Mylog\Contracts\LoggerInterface;
use Mylog\Enums\LogLevel;

readonly class Logger implements LoggerInterface
{
    public function __construct(
        private FileLoggerInterface $file,
    ){}


    public function log(LogLevel $level, string $message, array $data): void
    {
        try {
            $this->file->execute($level->value, $message, $data);
        } catch (Exception $e) {
            echo "Error: {$e->getMessage()}";
        }
    }
}