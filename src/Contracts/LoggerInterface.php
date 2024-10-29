<?php

namespace Mylog\Contracts;

use Mylog\Enums\LogLevel;

interface LoggerInterface
{
    public function log(LogLevel $level, string $message, array $data): void;
}