<?php
/**@var User [] $users */

use App\modules\User;

foreach ($users as $user) : ?>
    <h1><a href="?c=user&a=one&id=<?= $user->ID ?>"><?= $user->sLogin ?></a></h1>
<?php endforeach;?>