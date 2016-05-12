<?php

namespace Image;

require_once('MainModel.php');

use MainModel\MainModel;

class Image extends MainModel {

    public function __construct() {

        parent::__construct();

    }

    public function fetchData($tableName = 'Image') {

        $arr = [];

        if($query = $this->findAll($tableName)){
            while($row = $query->fetch_assoc()){
                $arr[] = [
                    'id' => $row['id'],
                    'url' => $row['url']
                ];
            }
        }

        mysqli_free_result($query);

        return $arr;

    }

    public function __destruct() {

        parent::__destruct();

    }

}