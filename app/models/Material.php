<?php

namespace App\models;

use App\helpers\Connection;

class Material
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM materials");
        return $query->fetchAll();
    }
}