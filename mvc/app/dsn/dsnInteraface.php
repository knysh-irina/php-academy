<?php

namespace Tasks\dsn;

interface dsnInteraface
{
    public function  __construct($host, $db);

    public function getConnectionString();
}