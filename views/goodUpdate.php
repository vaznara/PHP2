<?php
/**@var Good [] $goodUpdate */

use App\modules\Good;

?>
<form action="?c=good&a=save&id=<?= $goodUpdate->ID ?>" method="post">
    <? foreach ($goodUpdate as $key => $value) : ?>
        <? if ($key == 'ID') : continue ?><?php endif; ?>
            <input type="text" name="<?= $key ?>" value="<?= $value ?>"><br/>
    <?php endforeach; ?>
    <input type="submit" value="Изменить товар">
</form>