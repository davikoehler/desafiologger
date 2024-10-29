<?php

namespace Mylog;

use Exception;
use Mylog\Contracts\FileLoggerInterface;

readonly class FileLogger implements FileLoggerInterface
{
    public function __construct(
        private string $output
    ){}

    public function execute(string $level, string $message, array $data): void
    {
        $file = fopen($this->output, 'a+');

        if (false === $file) {
            throw new Exception('File is not created or invalid!');
        }

        $output = $this->formatOutput($level, $message, $data);
        fwrite($file, $output);
        fclose($file);
    }

    private function formatOutput(string $level, string $message, array $data): string
    {
        return date('Y-m-d H:i:s') . " | " . "{$level}: [{$message}] " . json_encode([$data]) . PHP_EOL;
    }


}