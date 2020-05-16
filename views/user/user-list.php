<?php

use yii\helpers\Html;


$this->title = 'User list';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Home', '/', ['class'=>'btn btn-primary', 'style' => 'float: left; margin-right: 10px; ']) ?>

    <table style="border: 4px double black; border-collapse: collapse;">
        <tr style="border-bottom: 1px solid black;">
            <td style ="padding: 10px;">User</td>
            <td style ="padding: 10px;">Balance</td>
        </tr>
        <?php if  (null !== $userList) : ?>
            <?php foreach ($userList as $user):  ?>
                <tr style ="padding: 10px;">
                    <td style ="padding: 10px;"><?= Html::encode("{$user['name']}" )?></td>
                    <td style ="padding: 10px;"><?= Html::encode("{$user['balance']}" )?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
    </table>
</div>