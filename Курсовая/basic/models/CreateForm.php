<?php
//sozdat pokupku
namespace app\models;
use yii\db\ActiveRecord;
use yii\base\Model;
use yii;

class CreateForm extends Model
{
    public $s_name;
    public $item;
    public $min_price;
    public function rules()
    {
        return [
            ['s_name', 'required'],
            ['min_price', 'required'],
            ['min_price', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function create()
    {

        if (!$this->validate()) {
            return null;
        }
        $model = new Buy();
        $model->o_id = Yii::$app->user->id;
        $model->s_name = $this->s_name;
        $model->i_id = Yii::$app->request->post('CreateForm')['item'];
        $model->min_price = $this->min_price;
        $model->save();
    }
}