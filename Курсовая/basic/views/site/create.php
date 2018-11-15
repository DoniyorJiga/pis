<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Item;

$this->title = 'Добавление автомобиля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-create']); ?>
            <?= $form->field($model, 's_name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'item')->dropDownList(
                Item::find()->select(['name', 'id'])->indexBy('id')->column(),
                ['prompt'=>'Выберите автомобиль']
            ); ?>
            <?= $form->field($model, 'min_price')->textInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>