<?php
//pokupka
namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

/**
 * User model
 *
 * @property integer $id
 * @property integer $o_id
 * @property string $s_name
 * @property integer $i_id
 * @property integer $min_price
 */
class Buy extends ActiveRecord
{
    public static function tableName()
    {
        return 'shopping';
    }

    public static function getInfo()
    {
        $sql = 'SELECT `s_id`, `i_id`, `name`, SUM(`total_price`) AS `total_price` FROM (SELECT `user`.`id` AS `u_id`, `user`.`username`, `shopping`.`id` as `s_id`, `shopping`.`min_price`, `item`.`id` AS `i_id`, `item`.`price`, `record`.`count`, (`record`.`count`*`item`.`price`) AS `total_price`, `shopping`.`s_name`, `item`.`name`, `item`.`image` FROM `shopping` LEFT JOIN `record` On `shopping`.`id`=`record`.`s_id` LEFT JOIN `user` ON `user`.`id`=`record`.`u_id` LEFT JOIN `item` ON `item`.`id`=`shopping`.`i_id`) AS `table1` GROUP BY `s_id`, `i_id`, `name`';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
    public static function getAll()
    {
        $data = self::find()->all();
        return $data;
    }
    public function getBuys() {
        $query=new Query();
        $query->addSelect(['*'])
            ->from ([Buy::tableName()])
            ->leftJoin(Item::tableName(),'shopping.i_id = item.id')
            ->leftJoin(User::tableName(),'shopping.o_id = user.id');
        return $query->all();
    }
    public function getBuysByID($id) {
        $sql = "SELECT `item`.`name`, `item`.`image`, `shopping`.`min_price`, `shopping`.id, `shopping`.`s_name`, SUM(`record`.`count`) AS `count`, `item`.`price` AS `price`, SUM(`item`.`price` * `record`.`count`) AS `total` FROM `shopping` LEFT JOIN `record` ON `shopping`.`id` = `record`.`s_id` LEFT JOIN `item` ON `item`.`id` = `shopping`.`i_id` WHERE `shopping`.`o_id`='".$id."' GROUP BY `item`.`name`, `item`.`image`, `item`.`price`, `shopping`.`min_price`, `shopping`.id ORDER BY `shopping`.id";
        $items = Yii::$app->db->createCommand($sql)->queryAll();
        for($i = 0; $i < count($items); $i++)
        {
            if($items[$i]['total'] >= $items[$i]['min_price'])
                $items[$i]['stop'] = 1;
            else
                $items[$i]['stop'] = 0;
            if(User::isAdmin(Yii::$app->user->identity->getId()))
                $items[$i]['is_admin'] = 1;
            else
                $items[$i]['is_admin'] = 0;
        }
        return $items;
    }
    public static function InsertRecord($id, $count)
    {
        $connection = Yii::$app->db;
        $connection->createCommand()->insert('record', ['s_id' => $id, 'u_id' => Yii::$app->user->identity->getId(), 'count' => $count])->execute();
    }
    public function getMyBuys($id) {
        $sql = "SELECT `item`.`name`, `item`.`image`, `shopping`.`min_price`, `shopping`.id, `shopping`.`s_name`, SUM(`record`.`count`) AS `count`, `item`.`price` AS `price`, SUM(`item`.`price` * `record`.`count`) AS `total` FROM `record` LEFT JOIN `shopping` ON `shopping`.`id` = `record`.`s_id` LEFT JOIN `item` ON `item`.`id` = `shopping`.`i_id` WHERE `record`.`u_id` = '".$id."' GROUP BY `item`.`name`, `item`.`image`, `item`.`price`, `shopping`.`min_price`, `shopping`.id, `shopping`.`s_name`";
        $items = Yii::$app->db->createCommand($sql)->queryAll();
        for($i = 0; $i < count($items); $i++)
        {
            if($items[$i]['total'] >= $items[$i]['min_price'])
                $items[$i]['stop'] = 1;
            else
                $items[$i]['stop'] = 0;
            if(User::isAdmin(Yii::$app->user->identity->getId()))
                $items[$i]['is_admin'] = 1;
            else
                $items[$i]['is_admin'] = 0;
        }
        return $items;
    }
    public function getAllBuys() {
        $sql = "SELECT `item`.`name`, `item`.`image`, `shopping`.`min_price`, `shopping`.id, `shopping`.`s_name`, SUM(`record`.`count`) AS `count`, `item`.`price` AS `price`, SUM(`item`.`price` * `record`.`count`) AS `total` FROM `shopping` LEFT JOIN `record` ON `shopping`.`id` = `record`.`s_id` LEFT JOIN `item` ON `item`.`id` = `shopping`.`i_id` GROUP BY `item`.`name`, `item`.`image`, `item`.`price`, `shopping`.`min_price`, `shopping`.id ORDER BY `shopping`.id";
        $items = Yii::$app->db->createCommand($sql)->queryAll();
        for($i = 0; $i < count($items); $i++)
        {
            if($items[$i]['total'] >= $items[$i]['min_price'])
                $items[$i]['stop'] = 1;
            else
                $items[$i]['stop'] = 0;
            if(User::isAdmin(Yii::$app->user->identity->getId()))
                $items[$i]['is_admin'] = 1;
            else
                $items[$i]['is_admin'] = 0;
        }
        return $items;
    }
}