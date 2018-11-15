<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'Корзина';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <?php foreach ($buys as $buy): ?>
                <div class="card col-lg-4">
                    <!-- Изображение -->
                    <img class="card-img-top" src="<?php echo $buy['image'] ?>">
                    <!-- Текстовый контент -->
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $buy['s_name'] ?></h4>
                        <h4 class="card-title"><?php echo $buy['name'] ?></h4>
                        <p class="card-text"><b>Стоимость автомобиля:</b> <?php echo $buy['price'] ?> руб.</p>
                        <p class="card-text"><b>Выбранное количество:</b> <?php echo $buy['count'] ?></p>
                        <p class="card-text"><b>Итого к оплате:</b> <?php echo $buy['total'] ?> руб.</p>
                    </div>
                    <div class="card-body">
                        <?php if($buy['stop'] == 1): ?>
                            <a href="<?= Yii::$app->urlManager->createUrl(['site/order', 'id' => $buy['id']]) ?>" class="btn btn-danger" style="width: 50%;">Оплатить</a>
                            <a href="<?= Yii::$app->urlManager->createUrl(['site/remove-order', 'id' => $buy['id']]) ?>" class="btn btn-warning" style="width: 25%;">Удалить</a>
                        <?php endif ?>
                        </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
