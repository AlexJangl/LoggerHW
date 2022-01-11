<?php

namespace Logger;

use mysqli;
use Logger\WriterInterface;

class DbWriter implements WriterInterface
{

    private mysqli $connection;

    private string $table = 'log_table';

    public function __construct($host, $user, $password, $db)
    {
        $this->connection = new mysqli($host, $user, $password, $db);

        if ($this->connection->connect_errno) {
            printf("connection failed: ", $this->connection->connect_error());
            exit();
        }
    }

    public function write(array $data)
    {

        $sql = "INSERT INTO " . $this->table . " (date, level, message, context) " .
            "VALUES ('"
                . $data['date']
                . "', '"
                . $data['level']
                . "', '"
                . $data['message']
                . "', '"
                . $data['contextLine']
            . "')";

        $this->connection->query($sql);

    }
}
