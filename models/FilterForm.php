<?php
/**
 * Created by PhpStorm.
 * User: Kostya
 * Date: 04.02.2018
 * Time: 21:13
 */

namespace app\models;

use Yii;
use yii\base\Model;


class FilterForm extends Model {

    public $groupGoods;
    public $stringItems;
    public $stringSizes;
    public $onlySale;
    public $unSale;


    public function rules() {
        return [
            [$this->attributes(), 'default']];

    }


}