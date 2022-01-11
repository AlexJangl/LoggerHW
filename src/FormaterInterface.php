<?php

namespace Logger;

interface FormaterInterface
{
    public function format($level, $message, array $context = []);
}