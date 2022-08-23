<?php

namespace App\Model;

use App\DB;
use App\App;

abstract class Model
{
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }
}