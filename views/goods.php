<?php
/**@var Good [] $goods */

use App\modules\Good;
?>
    <form action="?c=good&a=add" method="post">
        <label for="article">Артикул товара</label><input type="text" name="sArticle" id="article"><br />
        <label for="desk">Название товара</label><input type="text" name="sName" id="name"><br />
        <label for="desk">Описание товара</label><input type="text" name="sDescription" id="desk"><br />
        <label for="desk">Цена товара</label><input type="text" name="fPrice" id="price"><br />
        <input type="submit" value="Добавить товар">
    </form>
<? foreach ($goods as $good) : ?>
    <h1><a href="?c=good&a=one&id=<?= $good->ID ?>"><?= $good->sName ?></a></h1>
<?php endforeach;?>