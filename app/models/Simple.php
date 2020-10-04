<?php

namespace App\Model;

use App\Library\Database;
use App\Library\ModelSimple;

class Simple extends ModelSimple {

    public function __construct()
    {
        $this->dbh=Database::getInstance()->getDb();
    }

}
