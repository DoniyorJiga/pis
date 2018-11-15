<?php
//sdelat zakad
namespace app\models;
use yii\db\ActiveRecord;
use yii\base\Model;
use yii;
use app\models\Buy;

class OrderForm extends Model
{
    public $s_id;
    public $count;
    public function rules()
    {
        return [
            ['count', 'required'],
            ['count', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function order()
    {

        if (!$this->validate()) {
            return null;
        }
        Buy::InsertRecord($this->s_id, $this->count);
    }
}