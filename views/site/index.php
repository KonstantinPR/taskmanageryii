<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<?php
//$fileName = "../views/site/price.xls";
//$data = \moonland\phpexcel\Excel::import($fileName); // $config is an optional

////////////////////////////////-------------///////////////////////////////////////


// Вывести данные в формате: 1 фотография, ее характеристики в наличии через запятую, цена

//$dataUniqueID = new \app\models\FilterGood($data);
//
//$filters = [
//    'Categories (xyz..)' => 'Обувь,Свадебная обувь по 1-ой паре',
//    'Color' => ['белый', 'бежевый'],
//    'Size' => ['35', '36', '37', '35.5'],
//    'Manufacturer' => ['кожзам', 'кожа'],
//    'Wholesale price' => [180, 2400],
//];
//
////var_dump($filters);die;
//
//$filterData = $dataUniqueID->filteringData($data, $filters);
//$uniqueIDs = $dataUniqueID->groupCharacters($filterData, 'ID');
//var_dump($uniqueIDs);


////////////////////////////////-------------///////////////////////////////////////


?>

<div class="site-index">

    <div class="jumbotron">


        <form>
            <div class="form-row">


                <div class="form-group col-md-6">
                    <!--                <label for="inputState">State</label>-->
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Сформировать шаблон</button>
                </div>
                <div class="form-group col-md-6">
                    <!--                <label for="inputEmail4">Email</label>-->
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <!--                <label for="inputPassword4">Password</label>-->
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>


                <div class="form-group col-md-6">


                    <div class="form-group" align="left" style="margin-left: 20px;">
                        <label class="checkbox">
                            <input type="checkbox" name="onlysellexist" value="">
                            Показывать только со скидками
                        </label>
                    </div>

                    <div class="form-group" align="left" style="margin-left: 20px;">
                        <label class="checkbox">
                            <input type="checkbox"
                                   name="sellexist" checked="checked" value="">
                            Показывать без скидок
                        </label>
                    </div>
                    <hr/>
                    <div class="form-group" align="left" style="margin-left: 20px;">
                        <label class="checkbox">
                            <input type="checkbox" name="mainexist" value="">
                            Показывать только новинки
                        </label>
                    </div>

                </div>



                <div class="form-group col-md-6">

                    <div id="shoeskz" class="form-group" align="left" style="margin-left: 20px;">
                        <label class="checkbox ">
                            <input type="checkbox" name="leatherette" value="">
                            Искусственная кожа (только для обуви)
                        </label>
                    </div>
                    <div id="shoesk" class="form-group" align="left" style="margin-left: 20px;">
                        <label class="checkbox ">
                            <input type="checkbox" name="leather" value="" id="shoesleather">
                            Натуральная кожа (только для обуви)
                        </label>
                    </div>
                    <hr/>
                    <div class="form-group" align="left" style="margin-left: 20px;" id="Ivory">
                        <label class="checkbox ">
                            <input type="checkbox" name="ivory" value="">
                            Бежевый
                        </label>
                    </div>

                    <div class="form-group" align="left" style="margin-left: 20px;" id="White">
                        <label class="checkbox">
                            <input style="color: " type="checkbox" name="white" value="">
                            Белый
                        </label>
                    </div>
                    <hr/>
                    <div class="form-group" align="left" style="margin-left: 20px;" id="Color">
                        <label class="checkbox">
                            <input type="checkbox" name="colorexist" value="">
                            Без учета цвета
                        </label>
                    </div>
                    <div class="form-group" align="left" style="margin-left: 20px;">
                        <label class="checkbox">
                            <input type="checkbox" name="priceexist" value="">
                            Без цен и размеров
                        </label>
                    </div>
                    <div class="form-group" align="left" style="margin-left: 20px;display: none;" id='Dresses'>
                        <label class="checkbox">
                            <input type="checkbox" name="originalphoto" value="">
                            Показать оригиналы фотографий (разрешение 1600x2400). Только платья!
                        </label>
                    </div>
                    <div class="form-group" align="left" style="margin-left: 20px;">
                        <label class="checkbox">
                            <input type="checkbox" name="logoexist" value="">
                            Не показывать логотип
                        </label>
                    </div>
                </div>
            </div>
    </div>


    </form>


</div>

<div class="body-content">


</div>
</div>
