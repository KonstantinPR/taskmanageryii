<?php
/**
 * Created by PhpStorm.
 * User: Kostya
 * Date: 28.01.2018
 * Time: 10:37
 */

namespace app\models;


class FilterItem {

    protected $data;
    protected $dataIDs = array();
    protected $uniqueDataIDs = array();
    protected $goodsGrouped = array();


    function __construct($data) {
        $this->data = $data;
    }


//Фильтрует товары по заданному массиву $filters (тем значениям, которые не являются массивами)
//Описание проблемы - если клиент однозначно выбирает те критерии, которые ему нужны, например
//обувь белую 35 размера - то мы имеем однозначно название категории = обувь
//цвет=белый, и размер=35 - тогда данная функция отфильтрует правильно
//но что если клиент выбрал
//обувь белую и бежевую размер 35
//в таком случае в цвет у нас попало 2 значения, по которым нужно фильтровать
//а это уже массив и если у нас белая или бежевая обувь - то эту позицию в массиве надо оставить

    public function filteringData($data, $filters) {
        $filterData = $data;
        foreach ($filterData as $strings => $string) {
            foreach ($filters as $filter => $value) {
                if (!is_array($value)) { //если не массив, одиночные значения
                    if ($string[$filter] != $value) {
                        unset($filterData[$strings]);
                    }
                } elseif (is_integer($value[0]) and is_integer($value[1]) and count($value) == 2) {//если массив с диапазоном цен
                    if (!($string[$filter] > $value[0] and $string[$filter] < $value[1])) {
                        unset($filterData[$strings]);
                    }
                } else {//если массив не с диапазоном цен
                    if (!in_array($string[$filter], $value)) {
                        unset($filterData[$strings]);
                    }
                }
            }
        }
        return $filterData;
    }


//    Получает шапку таблицы (названия столбцов) как 0=>value т.е например 0=>'ID'
    protected function getHeader() {
        return array_keys($this->data[0]);
    }


//    Получает массив с уникальными значениями из столбца с шапкой $header
    public function uniqueValues($data, $header) {
        $uniqueDataIDs = array();
        foreach ($data as $string) {
            $uniqueDataIDs[$string[$header]] = $string[$header];
        }

        $uniqueDataIDs = array_unique($uniqueDataIDs);

        return $uniqueDataIDs;
    }


    // Выводит массив со сгруппированными данными
    // с 10.02.2018 - не актуален
    public function groupCharacters($data, $header) {

        $uniqueDataIDs = $this->uniqueValues($data, $header);
        $headers = $this->getHeader();

        foreach ($uniqueDataIDs as $item) {
            $NumberOfVariety = 1;
            foreach ($data as $string) {
                if ($item == $string[$header]) {
                    foreach ($headers as $nameColumns) {
                        $this->goodsGrouped[$item][$NumberOfVariety][$nameColumns] = $string[$nameColumns];
                    }
                    $NumberOfVariety++;
                }
            }
        }

        return $this->goodsGrouped;
    }


    // Подготавливает массив для выдачи в вид - он содержит
    // в себе многомерный массив готовый к передаче в вид
    // с 10.02.2018 - не актуален
    public function filterArray($data) {
        $group = array();
        foreach ($data as $array => $section) {
            foreach ($section as $key => $value) {
                empty($group[$section['ID']][$section['Color']][$key]) ? $separator = '' : $separator = ', ';
                if ($key == 'Size') {
                    $group[$section['ID']][$section['Color']][$key] = $group[$section['ID']][$section['Color']][$key] . $separator . $section['Size'];
                } else {
                    $group[$section['ID']][$section['Color']][$key] = $section[$key];
                }

            }
        }
        return $group;
    }


    public function filterArray2($data) {
        $group = array();
        foreach ($data as $array => $section) {
            foreach ($section as $key => $value) {
                if ($key == 'Size') {
                    empty($group[$section['Name *'] . $section['Color'] . $section['Wholesale price']][$key]) ? $separator = '' : $separator = ', ';
                    $group[$section['Name *'] . $section['Color'] . $section['Wholesale price']][$key] = $group[$section['Name *'] . $section['Color'] . $section['Wholesale price']][$key] . $separator . $section['Size'];
                } else {
                    $group[$section['Name *'] . $section['Color'] . $section['Wholesale price']][$key] = $section[$key];
                }
            }
        }


        return $group;
    }

}
