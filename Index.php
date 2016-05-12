<?php

namespace index;

require_once('Article.php');
require_once('Image.php');
require_once('ArticleImage.php');

use Article\Article;
use Image\Image;
use ArticleImage\ArticleImage;

class createJson {

    private function formatElementsInTheArray(&$newKey, &$oldKey) {

        $newKey = $oldKey;

    }

    public function createJson () {

        $arr_join = [];

        $Article = new Article();
        $Image = new Image();
        $ArticleImage = new ArticleImage();

        $Article = $Article->fetchData();
        $Image = $Image->fetchData();
        $ArticleImages = $ArticleImage->fetchData();


        foreach($Article as $val_article) {
            foreach($Image as $val_image) {
                foreach($ArticleImages as $val_article_image) {
                    if(
                        $val_article['id'] == $val_article_image['Article_id'] &&
                        $val_image['id'] == $val_article_image['Image_id']
                    ) {
                        $arr_join[] = [
                            'aid' => $val_article['id'],
                            'title' => $val_article['title'],
                            'url' => $val_article['url'],
                            'iid' => $val_image['id'],
                            'iurl' => $val_image['url'],
                        ];
                    }
                }
            }
        }

        $result = [];

        foreach($arr_join as $val_arr_json) {

            $image[] = [
                'id' => $val_arr_json['iid'],
                'url' => $val_arr_json['iurl'],
                '__MIDD__' => $val_arr_json['aid']
            ];


            $result['articles'] = [
                'id' => $val_arr_json['aid'],
                'title' => $val_arr_json['title'],
                'url' => $val_arr_json['url']
            ];
            $result['articles']['images'] = $image;
        }

        $arr_images = &$result['articles']['images'];
        array_values($arr_images);

        $this->formatElementsInTheArray($arr_images[0]['__FIRST__'], $arr_images[0]['__MIDD__']);
        unset($arr_images[0]['__MIDD__']);

        $this->formatElementsInTheArray($arr_images[count($arr_images)-1]['__LAST__'], $arr_images[count($arr_images)-1]['__MIDD__']);
        unset($arr_images[count($arr_images)-1]['__MIDD__']);

        return json_encode($result, JSON_UNESCAPED_SLASHES);

    }
}

$createJson = new createJson();

var_dump('<pre>');
    var_dump(json_decode($createJson->createJson()));
var_dump('</pre>');