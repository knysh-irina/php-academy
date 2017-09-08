<?php

namespace System;

use JsonSchema\Exception\ResourceNotFoundException;
use Tasks\dsn\mysqlDsn;

class dsnFabric
{
    static function getDsn($adapter, $host, $database)
    {
        switch ($adapter) {
            case "mysqli" :
                $obj = new mysqlDsn($host, $database);
                break;
            default :
                throw new \Exception();
        }
        return $obj;
    }
}