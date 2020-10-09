<?php

namespace frontend\modules\zagadki\model;

use Yii;

/**
 * This is the model class for table "puzzles".
 *
 * @property int $id  [id] => 1\n    [qustion] => Ждали маму с молоком,<br>А пустили волка в дом…<br>Кем же были эти<br>Маленькие дети?\n    [answer] => Семеро козлят\n    [cat_ids] => 1305,669\n    [img] => 
 * @property string $qustion
 * @property string $img
 * @property string $answer
 */
class Puzzles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'puzzles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qustion'], 'string'],
            [['img', 'answer'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qustion' => 'Qustion',
            'img' => 'Img',
            'answer' => 'Answer',
        ];
    }
}
