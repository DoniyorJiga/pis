<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'Каталог автомобилей';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <?php foreach ($models as $item): ?>
                <div class="card col-lg-4">
                    <!-- Изображение -->
                    <img class="card-img-top" src="<?php echo$item->image ?>">
                    <!-- Текстовый контент -->
                    <div class="card-body">
                        <h4 class="card-title"><?php echo$item->name ?></h4>
                        <p class="card-text"> </p>
                    </div>
                    <div class="card-body">
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/item', 'id' => $item->id]) ?>" class="btn btn-primary">Просмотр</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
