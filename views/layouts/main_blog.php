<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <style>
            body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }
            .soc-box .soc-box__item { margin: 0 10px;font-size: 20px;color: #81868e;}
            .soc-box .soc-box__item:hover{color: #4d4848;}
            .circle_soc-box a {
                display: inline-block;
                width: 35px;
                height: 35px;
                border: 1px solid #8c868e;
                border-radius: 50%;
                text-align: center;
                margin: 5px 5px 0;
                transition: .5s background;
            }
            .circle_soc-box a .soc-box__item{
                font-size: 20px;
                color: #81868e;
                line-height: 31px;
                display: block;
                height: 100%;
            }
            .circle_soc-box a .soc-box__item:hover{
                color:#fff;
            }
            .circle_soc-box a.vk:hover{
                background: #507299;
                border-color: #507299;
            }
            .circle_soc-box a.ok:hover{
                background: #ed812b;
                border-color: #ed812b;
            }
        </style>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div id="page-preloader">
        <div class="slogan">
            <img src="/img/logo.png" alt="" class="img-responsive">
            <h1>Лучшее - не только детям!</h1>
        </div>
    </div>

    <header class="main-header blog-nav-menu-bg">
        <div class="container-fluid">
            <!--navMenu START-->
            <!-- <div class="row">
                   <button class="menu-open"><i class="fa fa-bars" aria-hidden="true"></i></button>
                   <nav class="main-nav blog-nav-menu">
                       <ul class="navigation">
                           <li><a class="is-current" href="#head">Главная</a></li>
                           <li><a href="#about-us">О нас</a></li>
                           <li><a href="#our-products">Продукция</a></li>
                           <li><a href="#our-story">История</a></li>
                           <li><a href="#news">Новости</a></li>
                           <li><a href="#contacts">Контакты</a></li>
                       </ul>
                   </nav>
               </div>-->
            <div class="row ">
                <button class="menu-open"><i class="fa fa-bars" aria-hidden="true"></i></button>
                <a class="navbar-brand" href="/"><img src="/img/logo.png" alt="Dispute Bills">
                </a>
                <nav class="main-nav blog-nav-menu blog-nav-menu-green ">
                    <ul class="navigation">
                        <li><a href="<?= Url::toRoute('site/index')?>">Главная</a></li>
                        <li><a href="#about-us">О нас</a></li>
                        <li><a href="#our-products">Продукция</a></li>
                        <li><a href="#our-story">История</a></li>
                        <li><a class="is-current-green" href="<?=Url::toRoute('site/blogs')?>">Новости</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                    </ul>
                </nav>
            </div>
            <!-- navMenu END-->
        </div>
    </header>


    <?= $content ?>



    <footer class="parallax-window" data-parallax="scroll" data-z-index="1" data-image-src="/img/footer-bg.jpg">
        <div class="logo">
            <img src="/img/logo2.png" alt="" class="img-responsive">
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>