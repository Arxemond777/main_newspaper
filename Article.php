<?php

namespace Article;

require_once('MainModel.php');

use MainModel\MainModel;

class Article extends MainModel {

    public function __construct() {

        parent::__construct();

    }

    public function fetchData($tableName  = 'Article') {

        $arr = [];

        if($query = $this->findAll($tableName)) {
            while($row = $query->fetch_assoc()){
                $arr[] = [
                    'id' => $row['id'],
                    'title' => $row['title'],
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