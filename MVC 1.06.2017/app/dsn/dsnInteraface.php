<?php

namespace ToilonShop\dsn;

interface dsnInteraface
{
    public function  __construct($host, $db);

    public function getConnectionString();
}