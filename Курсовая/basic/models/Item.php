<?php
//tovar
namespace app\models;
use yii\db\ActiveRecord;


class Item extends ActiveRecord
{
    public static function tableName()
    {
        return 'item';
    }


    public static function getAll()
    {
        $data = self::find()->all();
        return $data;
    }
}