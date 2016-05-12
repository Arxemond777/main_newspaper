<?php

namespace MainModel;

require_once('ConnectBd.php');

use ConnectBd\ConnectBd;

abstract class MainModel extends ConnectBd {

    abstract function fetchData($tableName);

    final protected function findAll($tableName){

        if($tableName) {

            return $this->mysql
                    ->query("SELECT * FROM $tableName");

        }

    }
}