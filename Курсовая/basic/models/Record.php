<?php
//zapisi iz baza dannix
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
class Record extends ActiveRecord
{
    public static function tableName()
    {
        return 'record';
    }
//SELECT `shopping`.`s_name`, `record`.`count`, `shopping`.`i_id`, `item`.`name`, `item`.`price` FROM `record` LEFT JOIN `shopping` ON `shopping`.`id`=`record`.`s_id` LEFT JOIN `item` ON `item`.`id`=`shopping`.`i_id`
    public static function getByID($id)
    {
        $sql = 'SELECT `s_id`, `i_id`, `name`, SUM(`total_price`) AS `total_price` FROM (SELECT `user`.`id` AS `u_id`, `user`.`username`, `shopping`.`id` as `s_id`, `shopping`.`min_price`, `item`.`id` AS `i_id`, `item`.`price`, `record`.`count`, (`record`.`count`*`item`.`price`) AS `total_price`, `shopping`.`s_name`, `item`.`name`, `item`.`image` FROM `shopping` LEFT JOIN `record` On `shopping`.`id`=`record`.`s_id` LEFT JOIN `user` ON `user`.`id`=`record`.`u_id` LEFT JOIN `item` ON `item`.`id`=`shopping`.`i_id`) AS `table1` GROUP BY `s_id`, `i_id`, `name`';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}