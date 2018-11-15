<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'Покупки';
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
                        <p class="card-text"><b>Автомобиль:</b> <?php echo $buy['name'] ?></p>
                        <p class="card-text"><b>Стоимость автомобиля:</b> <?php echo $buy['price'] ?> руб.</p>
                        <p class="card-text"><b>Сумма заказа:</b> <?php echo $buy['total']?$buy['total']:0  ?> руб.</p>
                        <p class="card-text"><b>Минимальная сумма :</b> <?php echo $buy['min_price'] ?> руб.</p>
                        <?php if($buy['is_admin'] == 1): ?>
                            <?php if($buy['stop'] == 1): ?>
                                <p class="card-text"><b>Статус покупки:</b> <span style="color: red; font-weight: bold;">СТОП</span></p>
                            <?php endif ?>
                            <?php if($buy['stop'] == 0): ?>
                                <p class="card-text"><b>Статус покупки:</b> <span style="color: green; font-weight: bold;">АКТИВНА</span></p>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <div class="card-body">

                        <?php if($buy['is_admin'] != 1): ?>
                            <?php if($buy['stop'] != 1): ?>
                                <p class="card-text"><b>Статус покупки:</b> <span style="color: green; font-weight: bold;">АКТИВНА</span></p>
                                <a href="<?= Yii::$app->urlManager->createUrl(['site/buy', 'id' => $buy['id']]) ?>" class="btn btn-success" style="width: 50%;">Купить</a>
                            <?php endif ?>
                            <?php if($buy['stop'] == 1): ?>
                                <p class="card-text"><b>Статус покупки:</b> <span style="color: red; font-weight: bold;">Нет в наличии</span></p>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
