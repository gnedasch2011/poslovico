<?php

namespace frontend\modules\site\controllers;

use frontend\modules\category\model\Category;
use frontend\modules\page\model\Page;
use frontend\modules\url\components\ControllerWithParam;
use Yii;
use yii\web\Controller;


class DefaultController extends ControllerWithParam
{
    public function actionMainPage()
    {

//        $res = \Yii::$app->db->createCommand('SELECT * FROM puzzles.items')
//            ->bindValues([
//                ]
//            )
//            ->queryAll();
//
//        foreach ($res as $item) {
//            $findDoubles = \Yii::$app->db->createCommand('SELECT * FROM puzzles.items where qustion = :qustion AND id !=:id')
//                ->bindValues([
//                        ':qustion' => $item['qustion'],
//                        ':id' => $item['id'],
//                    ]
//                )
//                ->queryAll();
//
//
//            if ($findDoubles) {
//                $items_categorys_ids = [];
//
//                foreach ($findDoubles as $findDouble) {
//
//                    Yii::$app->db->createCommand()->delete('items', ['id' => $findDouble['id']])->execute();
//                    $items_categorys_ids[] = $findDouble['id'];
//                }
//
//                //удаляем из items_categorys
//                foreach ($items_categorys_ids as $item_category) {
//                           Yii::$app->db->createCommand()->delete('items_categorys', ['id'=>$item_category])->execute();
//
//                }
//            }
//
//        }
//
//        echo "<pre>";
//        print_r($res);
//        die();


        $this->view->title = "Поговорки  | 15000 поговорок на Pro-Zagadki.ru";
        $this->view->registerMetaTag(
            ['name' => 'description', 'content' => "Лучшие загадки  для детей и взрослых! Более 15000 поговорок на разные темы на Pro-Zagadki.ru"]
        );


        $urlsCategorys = \Yii::$app->db->createCommand('SELECT c.* FROM items_categorys ic
right join category c on c.id = ic.category_id
where category_id is not null
group by c.name')->queryAll();

        $i = 0;
        $res = [];

        foreach ($urlsCategorys as $urlCategory) {
            if ($i > 10) {
                $letter = mb_substr($urlCategory['name'], 0, 1, 'utf-8');
                $res[$letter][$urlCategory['name']]['name'] = $urlCategory['name'];
                $res[$letter][$urlCategory['name']]['url'] = '/' . $urlCategory['name_transliteration'];
            }

            $i++;
        }

        ksort($res);

        return $this->render('MainPage', [
            'urlsCategorysGroup' => $res,
        ]);
    }


}

