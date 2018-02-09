<?php

/**
 * Created by PhpStorm.
 * User: Kostya
 * Date: 05.02.2018
 * Time: 20:22
 * Редактирует строки, массивы и другие поступающие данные
 */

namespace app\models;


class Formatter {


    // Удаляет пробелы из переданной строки и разделяет по запятым в массив
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
    // преобразовывая ключи в значения полученные от пользователя
    public static function toFilterArray($model) {

        //Соответствие названий полей формы с полями таблицы. Вынести в константы!!!
        $accords = [
            'groupGoods' => 'Categories (xyz..)',
            'stringItems' => 'ID',
            'stringSizes' => 'Size',
            'color' => 'Color'
        ];

        //
        $modelProperties = get_class_vars(get_class($model));
        $filterArray = array();

        foreach ($modelProperties as $modelProperty => $value) {
            foreach ($accords as $accord => $excelHeader) {
                if ($modelProperty == $accord) {
                    $filterArray[$excelHeader] = $model->$modelProperty;
                }
            }
        }

        return $filterArray;

    }


    //Удаление пустых элементов массива, в т.ч. двумерных, присланных из формы
    public static function deleteEmptyItemsArray(Array $filterArray) {

        foreach ($filterArray as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $items => $item) {
                    if ($item == '') {
                        unset($filterArray[$key]);
                    }
                }
            } elseif ($value == '') {
                unset($filterArray[$key]);
            }
        }

        return $filterArray;
    }


}