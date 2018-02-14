<?php foreach ($group as $groups => $name): ?>


   <?php $img = explode(',', $name['ImageURLs(x,y,z..)']); ?>
                                    <img width="300"  src="<?= $img[0] ?>">


                                <?= $name['ID'] ?></a>



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


            <?php endforeach; ?>

