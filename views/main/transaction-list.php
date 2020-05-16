<?php
use yii\helpers\Html;


$this->title = 'Transaction list';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Home', '/', ['class'=>'btn btn-primary', 'style' => 'float: left; margin-right: 10px; ']) ?>

    <table style="border: 4px double black; border-collapse: collapse;">
        <tr style="border-bottom: 1px solid black;">
            <td style ="padding: 10px;">Id</td>
            <td style ="padding: 10px;">User From</td>
            <td style ="padding: 10px;">User To</td>
            <td style ="padding: 10px;">Amount</td>
            <td style ="padding: 10px;">Date</td>
        </tr>
        <?php if  (null !== $transactionList) : ?>
            <?php foreach ($transactionList as $transaction):  ?>
                <tr style ="padding: 10px;">
                    <td style ="padding: 10px;"><?= Html::encode("{$transaction['id']}" )?></td>
                    <td style ="padding: 10px;"><?= Html::encode("{$transaction['userFromName']}" )?></td>
                    <td style ="padding: 10px;"><?= Html::encode("{$transaction['userToName']}" )?></td>
                    <td style ="padding: 10px;"><?= Html::encode("{$transaction['amount']}" )?></td>
                    <td style ="padding: 10px;"><?= Html::encode("{$transaction['date_done']}" )?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
    </table>
</div>