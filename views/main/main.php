<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Main';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" style="display: block">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Users list', 'user-list', ['class'=>'btn btn-primary', 'style' => 'float: left; margin-right: 10px; ']) ?>
    <?= Html::a('Transaction list', 'transaction-list', ['class'=>'btn btn-primary', 'style' => 'float: left; margin-right: 10px; ']) ?>
    <?= Html::a('Logout', 'logout', ['class'=>'btn btn-primary', 'style' => 'float: left; margin-right: 10px; ']) ?>
    <div class="col-lg-8">
        <?= Html::encode($user['name'] ) ?>, you balance: <?= Html::encode($user['balance'] ) ?>, enter user name and amount to send somebody
    </div>
    <span style="color: red;"><?php echo $errors; ?></span>
    <?php $form = ActiveForm::begin([
        'id' => 'send-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "\n{label}<div class=\"col-lg-2\">{input}</div>\n<div class=\"col-lg-1\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <br>

    <?= Html::input('text','name','', $options=['class'=>'form-control', 'placeholder'=>'name', 'required'=>'required', 'style'=>'width:150px; margin-left: 190px; margin-top: 20px;']) ?>
    <?= Html::input('number','amount','', $options=['class'=>'form-control','maxlength'=>10, 'min'=>'0.01', 'step'=>'0.01', 'placeholder'=>'amount', 'required'=>'required', 'style'=>'width:150px; margin-left: 190px; margin-top: 20px;']) ?>

    <div class="form-group">
        <div style="margin-top: 20px;" class="col-lg-offset-2 col-lg-1">
            <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
