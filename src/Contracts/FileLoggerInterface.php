<?php

namespace Mylog\Contracts;

interface FileLoggerInterface
{
    public function execute(string $level, string $message, array $data): void;
}