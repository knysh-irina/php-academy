<?php

namespace Tasks\dsn;

class mysqlDsn implements dsnInteraface
{
    private $host;
    private $db;

    public function __construct($host, $db)
    {
        $this->host = $host;
        $this->db = $db;
    }

    public function getConnectionString()
    {
        return 'mysql:host=' . $this->host . ';dbname=' . $this->db;
    }
}