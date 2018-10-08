<?php

use yii\helpers\Html;

$menuItems = [
    ['label' => 'Меню', 'options' => ['class' => 'header']],
    ['label' => 'Панель состояния', 'icon' => 'tachometer', 'url' => ['/site/index']],
    [
        'label' => 'Инвентаризация',
        'icon' => 'th',
        'url' => '#',
        'items' => [
            ['label' => 'Кабинеты', 'icon' => 'circle-o', 'url' => ['/room']],
            ['label' => 'Обрудование', 'icon' => 'circle-o', 'url' => ['/equipment']],
        ],
    ],
    ['label' => 'Разработка', 'options' => ['class' => 'header']],
    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
];

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img('@web/img/admin.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
