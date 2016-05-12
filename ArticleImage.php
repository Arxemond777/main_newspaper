<?php

namespace ArticleImage;

require_once('MainModel.php');

use MainModel\MainModel;

class ArticleImage extends MainModel {

    public function __construct() {

        parent::__construct();

    }

    public function fetchData($tableName = 'Article_image') {

        $arr = [];

        if($query = $this->findAll($tableName)){
            while($row = $query->fetch_assoc()){
                $arr[] = [
                    'id' => $row['id'],
                    'Article_id' => $row['Article_id'],
                    'Image_id' => $row['Image_id']
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