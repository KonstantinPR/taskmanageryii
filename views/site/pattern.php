<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

/* @var $group app\models\FilterItem */


$this->title = 'Pattern';
$this->params['breadcrumbs'][] = $this->title;
?>


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--
        This template is provided for free of charge by Email on Acid, LLC.

        Every email client is different. See exactly how your email looks in the most popular inboxes, so you can fix any problems before you hit send.
        https://www.emailonacid.com/
        -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <title>Responsive Email Template</title>

    <style type="text/css">
        .ReadMsgBody {
            width: 100%;
            background-color: #ffffff;
        }

        .ExternalClass {
            width: 100%;
            background-color: #ffffff;
        }

        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            font-family: Georgia, Times, serif
        }

        table {
            border-collapse: collapse;
        }

        @media only screen and (max-width: 640px) {
            .deviceWidth {
                width: 440px !important;
                padding: 0;
            }

            .center {
                text-align: center !important;
            }
        }

        @media only screen and (max-width: 479px) {
            .deviceWidth {
                width: 280px !important;
                padding: 0;
            }

            .center {
                text-align: center !important;
            }
        }

    </style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"
      style="font-family:Open Sans, Georgia, Times, serif">

<!-- Wrapper -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="100%" valign="top" bgcolor="#ffffff" style="padding-top:20px">

            <!-- Start Header-->
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth"
                   style="margin:0 auto;">
                <tr>
                    <td width="100%" bgcolor="#ffffff">

                        <!-- Logo -->
                        <table border="0" cellpadding="0" cellspacing="0" align="left" class="deviceWidth">
                            <tr>
                                <td align="center"
                                    style="font-family:Open Sans, Georgia, Times, serif; padding:0px 0px"
                                    class="center">
                                    <a style="text-underline: none" href="#"><img width="200"
                                                                                  src="http://elenachezelle.ru/allimg/logo.png"></a>
                                </td>
                            </tr>
                        </table><!-- End Logo -->

                        <!-- Nav -->
                        <table border="0" cellpadding="0" cellspacing="0" align="right" class="deviceWidth">
                            <tr>
                                <td class="center"
                                    style="font-size: 13px; color: #272727; text-align: right; font-family:Open Sans, Georgia, Times, serif; line-height: 20px; vertical-align: middle; padding:0px 20px;">
                                    <a href="#"
                                       style="vertical-align:middle;font-size: 20px;px;text-decoration: none; color: #3b3b3b;">8
                                        (812)
                                        448-94-96</a>

                                </td>
                            </tr>
                        </table><!-- End Nav -->


                    </td>
                </tr>
            </table><!-- End Header -->
            <br>

            <!-- 3 Small Images -->
            <table width="630" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" bgcolor="#fff"
                   style="margin:0 auto;">
                <tr>
                    <td valign="top">

                        <?php foreach ($group as $groups => $name): ?>

                            <table width="33%" align="left" cellpadding="0" cellspacing="0" class="deviceWidth">
                                <tr>
                                    <td valign="top" align="center" style="padding:10px 0">
                                        <p style="mso-table-lspace:0;mso-table-rspace:0; margin:0">

                                            <?php $fullImage = $name['ImageURLs(x,y,z..)']; ?>
                                            <?php $img = str_replace('allimg','allsmallh300',explode(',', $name['ImageURLs(x,y,z..)'])); ?>
                                            <?php $nameID = $name['ID'] ?>
                                            <a target="_blank"
                                               href="<?= Url::to(['site/one', 'fullImage' => $fullImage, 'nameID' => $nameID]) ?>"><img

                                                    width="200" height="300" src="<?= $img[0] ?>" alt=""
                                                    border="0"
                                                    style="border-radius: 4px; width: 200px;"
                                                    class="deviceWidth"/></a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="120px" valign="top" style="padding:0 10px 20px 10px">
                                        <a href="#"
                                           style="text-decoration: none; font-size: 14px; color: #111; font-weight: bold; font-family:Open Sans, Arial, sans-serif ">

                                            <?= $name['ID'] ?></a>

                                        <p style="color:#111; text-align:left; font-size: 12px; line-height:17px; font-family:Open Sans, Arial, sans-serif">

                                            <? if (!$name['Color'] == '') {
                                                echo $name['Color'] . '<br>';
                                            } ?>
                                            <? if (!$name['Size'] == '') {
                                                echo 'Размеры: ' . $name['Size'] . '<br>';
                                            } ?>
                                            <b><?= $name['Wholesale price'] ?></b> руб.
                                            <br>

                                            <?php foreach ($name as $key => $value): ?>

                                            <?php endforeach; ?>

                                        </p>
                                    </td>
                                </tr>
                            </table><!-- End Image 1 -->

                        <?php endforeach; ?>

                    </td>
                </tr>

            </table><!-- End 3 Small Images -->
            <!-- Dark Background, Three Column Images -->
        </td>
    </tr>
</table> <!-- End Wrapper -->
<div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">
    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
</div>
</body>
</html>

