<?php
/**
 * Created by PhpStorm.
 * User: Kostya
 * Date: 12.02.2018
 * Time: 23:10
 */


$arrayImg = explode(',', $fullImage);

?>

<table align="center">
    <br>
    <tr>
        <td align="center">Артикул: <?php echo $nameID ?><br></td>
    </tr>

    <?php foreach ($arrayImg as $images => $img): ?>
        <tr>
            <td align="center"><img width="95%" src="<?php echo $img ?>"></td>
        </tr>
    <?php endforeach; ?>
</table>
