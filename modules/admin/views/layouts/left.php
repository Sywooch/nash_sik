<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <?php if(!Yii::$app->user->isGuest): ?>
                    <p>Администратор</p>
                <?php endif;?>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>




        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Админ панель', 'options' => ['class' => 'header']],

//                                [
//                                    'label' => 'Главная',
//                                    'url' => ['#'],
//                                    'items' => [
//                                        [
//                                            'label' => 'Презентация',
//                                            'url' => ['/admin/header/upload'],
//
//                                        ],
//                                        [
//                                            'label' => 'Текст',
//                                            'url' => ['/admin/header/index'],
//
//                                        ],]
//                                ],
                                ['label' => 'Главная', 'url' => ['/admin/header/view?id=1'],],
                                ['label' => 'О нас', 'url' => ['/admin/about/view?id=1'],],
                                ['label' => 'Продукция', 'url' => ['/admin/products/index'],],
                                ['label' => 'Блог', 'url' => ['/admin/blog/index'],],
                            ]
                        ],
                    ['label' => 'Блог', 'url' => ['/admin/blog/index'],]

        ) ?>
                <div class="menu-list">
                    <ul class="nav navbar-nav auth">
                        <?php if(Yii::$app->user->isGuest):?>
                            <li><a href="<?= \yii\helpers\Url::to(['auth/login'])?>">Login</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['auth/signup'])?>">Register</a></li>
                        <?php else: ?>
                            <?= \yii\helpers\Html::beginForm(['/auth/logout'], 'post')
                            . \yii\helpers\Html::submitButton(
                                'Выйти (' . Yii::$app->user->identity->name .')',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                            )
                            . \yii\helpers\Html::endForm() ?>
                        <?php endif;?>
                    </ul>
                </div>

    </section>

</aside>
