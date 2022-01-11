<?php

include "vendor/autoload.php";

$fileLog = new \Logger\Logger(
    new \Logger\FileWriter('test.log'),
    new \Logger\Formater()
);

$fileLog->info("Info");
$fileLog->alert("Alert");
$fileLog->error("Error");
$fileLog->debug("Debug");
$fileLog->notice("Notice");
$fileLog->warning("Warning");
$fileLog->critical("Critical");
$fileLog->emergency("Emergency");

$dbLog = new Logger\Logger(
    new \Logger\DbWriter('localhost', 'root', '', 'logger_test'),
    new \Logger\Formater()
);

$dbLog->info("Info message");
$dbLog->alert("Alert message");
$dbLog->error("Error message");
$dbLog->debug("Debug message");
$dbLog->notice("Notice message");
$dbLog->warning("Warning message");
$dbLog->critical("Critical message");
$dbLog->emergency("Emergency message");