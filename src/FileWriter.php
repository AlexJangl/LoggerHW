<?php

namespace Logger;

use Logger\WriterInterface;

class FileWriter implements WriterInterface
{

    public $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($this->filePath)) {
            touch($this->filePath);
        }
    }

    public function write(array $data)
    {
        file_put_contents($this->filePath, $data['formatedLine'], FILE_APPEND);
    }

}