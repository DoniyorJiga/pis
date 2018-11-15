<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Item;

$this->title = 'Order';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-order']); ?>
            <?= $form->field($model, 'count')->textInput(['autofocus' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton('Order', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>