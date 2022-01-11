<?php

namespace Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    private WriterInterface $writer;
    private FormaterInterface $formater;

    public function __construct(WriterInterface $writer, FormaterInterface $formater)
    {
        $this->writer = $writer;
        $this->formater = $formater;
    }

    public function log($level, $message, array $context = []):void
    {
        $this->writer->write([
            'date' => $this->formater->getDate(),
            'level' => $level,
            'message' => $message,
            'context' => $context,
            'contextLine' => $this->formater->arrayToString($context),
            'formatedLine' => $this->formater->format($level, $message, $context)
        ]);
    }

}