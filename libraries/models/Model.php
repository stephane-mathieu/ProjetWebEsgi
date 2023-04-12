<?php

namespace Models;

use Models\Database;

abstract class Model {

    protected $pdo;

    public function __construct(){

        $this->pdo = Database::getPdo();
    }


}

?>