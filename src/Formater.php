<?php

namespace Logger;

use DateTime;

class Formater implements FormaterInterface
{
    private $dateFormat = 'Y-m-d H:i:s';

    private $template = "{date} {level} {message} {context}";

    public function format($level, $message, array $context = [])
    {
        return trim(strtr($this->template, [
                '{date}' => $this->getDate(),
                '{level}' => $level,
                '{message}' => $message,
                '{context}' => $this->arrayToString($context),
            ])) . PHP_EOL;

    }

    public function getDate()
    {
        return (new DateTime())->format($this->dateFormat);
    }

    public function arrayToString(array $context = [])
    {
        return !empty($context) ? json_encode($context) : null;
    }
}