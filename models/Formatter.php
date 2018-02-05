<?php

/**
 * Created by PhpStorm.
 * User: Kostya
 * Date: 05.02.2018
 * Time: 20:22
 * Редактирует строки, массивы и другие поступающие данные
 */

namespace app\models;

use phpDocumentor\Reflection\Types\Array_;

class Formatter {


    // Удаляет пробелы из переданной строки
    public static function spaceRemover(FilterForm $model, Array $strings) {
        $stringNoSpace = array();
        foreach ($strings as $string => $value) {
            $newString = $model->$value;
            $stringArray = explode(',', $newString);
            foreach ($stringArray as $item) {
                $stringNoSpace[$value][] = trim($item);
            }
            $model->$value = $stringNoSpace[$value];
        }

        return true;

    }


    // Преобразовывает модель, полученную из формы в массив,
    // содержащий только поля фильтра (свойства класса)
    public static function toFilterArray($model) {

        $accords = [
            'groupGoods' => 'Categories (xyz..)',
            'stringItems' => 'ID',
            'stringSizes' => 'Size'
        ];

        $modelProperties = get_class_vars(get_class($model));
        $filterArray = array();

        foreach ($modelProperties as $modelProperty => $value) {
            foreach ($accords as $modelProperty => $excelHeader) {
                if ($modelProperty == $modelProperty) {
                    $filterArray[$excelHeader] = $model->$modelProperty;
                }
            }
        }

        return $filterArray;

    }


}