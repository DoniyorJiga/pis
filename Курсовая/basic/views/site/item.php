<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = $item->name;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="card col-lg-4 border-primary">
                <!-- Изображение -->
                <img class="card-img-top" src="<?php echo $item->image ?>">
                <!-- Текстовый контент -->
                <div class="card-body">
                    <p class="card-text"><?php echo $item->info ?></p>
                    <p class="card-text"><?php echo $item->price ?> руб.</p>
                </div>
                <!--
                <div class="card-body">
                <a href="#" class="btn btn-primary">Просмотр</a>
                </div>
                -->
            </div>
        </div>
    </div>
</div>
