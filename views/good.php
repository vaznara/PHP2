<?php

use App\modules\Good;
?>
<div>
    <h1><?= /** @var Good $good */ $good->sName ?></h1>
    <ul>
        <? foreach ($good as $key => $value): ?>
        <li><b><?= $key ?></b>: <?= $value ?> <a href="?c=good&a=update&id=<?= $good->ID?>">Редактировать товар</a></li>
        <? endforeach; ?>
    </ul>
</div>