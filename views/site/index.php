<?php
use yii\helpers\Url;

Yii::setAlias('@images', dirname(dirname(dirname(__DIR__))) . '/web/img/');
?>

<section id="head" class="s-head clearfix">
    <div class="container-fluid no-padding">
        <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-xs-12">
            <div class="left-side">
                <div class="topline">
                    <a href="#" class="logo">
                        <img src="/img/logo.png" alt="" class="img-responsive">
                    </a>
                </div>
                <div class="slogan">
                    <h1>Лучшее - не только детям!</h1>
                    <h5>Все, что мы делаем для взрослых, <br>мы делаем как для детей</h5>
                    <img src="/img/products.png" alt="" class="products-img img-responsive">
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 slider-wrapper">
            <div class="right-side head-slider">
                <?php foreach ($header->images as $head):?>
                <img src="/img/header/<?=$head->name?>" alt="" class="img-responsive">
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="btn-scroll-wrapper">
        <a href="#about-us" class="scroll-bot"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
    </div>
</section>

<section id="about-us" class="s-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <div class="description-text">
                    <h2>Что такое Одесский?</h2>
                    <div class="text-group">
                        <h6>Качество завода детского питания</h6>
                        <p>Все, что мы делаем для взрослых, мы делаем с особой заботой о безопасности и пользе</p>
                    </div>
                    <div class="text-group">
                        <h6>Традиции  качества</h6>
                        <p>Соки и нектары Одесского завода детского питания выпускаются уже более 50 лет, сохраняя традиции вкуса и качества</p>
                    </div>
                    <div class="text-group">
                        <h6>Собственная переработка фруктов</h6>
                        <p>Соки  изготавливаются из качественных фруктов, большую часть из которых мы перерабатываем сами</p>
                    </div>
                    <div class="text-group">
                        <h6>Всегда доступный</h6>
                        <p>Мы делаем наш продукт  доступным для миллионов покупателей</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="videofile">
                   <?=$about->link?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="s-parallax parallax-window" data-parallax="scroll" data-z-index="1" data-image-src="img/footer-bg.jpg"></section>

<section id="our-products" class="s-our-products">
    <div class="container">
        <h3>Наша продукция</h3>
        <div class="first-mark">
            <div class="volume" style="position: relative; z-index: 10;">
                <span class="volume-count">0.95 л.</span>
                <p>Рассширенный ассортимент вкусов</p>
            </div>
            <div class="row clearfix">
                <div class="content">

                    <?php foreach ($product1->images as $image1):?>
                        <article><img src="/img/products/<?=$image1->name?>" alt="" class="img-responsive"></article>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <div class="second-mark">
            <div class="volume">
                <span class="volume-count">1.93 л.</span>
                <p>Ещё больше экономии</p>
            </div>
            <div class="row clearfix">
                <div class="content">
                    <?php foreach ($product2->images as $image2):?>
                    <article><img src="/img/products/<?=$image2->name?>" alt="" class="img-responsive"></article>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <div class="third-mark">
            <div class="volume">
                <span class="volume-count">0.2 л.</span>
                <p>Порционный формат</p>
            </div>
            <div class="content">
                <?php foreach ($product3->images as $image3):?>
                    <article><img src="/img/products/<?=$image3->name?>" alt="" class="img-responsive"></article>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>

<section id="our-story" class="s-our-story">
    <div class="container">
        <h3>Наша история и традиции</h3>
        <div class="row">
            <div class="story-slider">

                <div class="slide first">
                    <div class="collage">
                        <div class="img-wrapp large-img">
                            <img src="/img/story/1928/1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="img-wrapp small-img">
                            <img src="/img/story/1928/2.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="description-text">
                        <p> Завод основан в  1867 году как  небольшая частная консервная фабрика. В 1928 году Фабрика превращается в <span>крупный завод.</span> Зарождаются традиции по производству высококачественных консервных продуктов питания. </p>
                    </div>
                </div>

                <div class="slide second">
                    <div class="collage">
                        <div class="img-wrapp large-img">
                            <img src="/img/story/1960/1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="img-wrapp small-img">
                            <img src="/img/story/1960/2.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="description-text">
                        <p>1960 - Начинается производство соков и пюре для детского питания из местных фруктов и овощей. Одесский завод <span>обеспечивает около 60% потребности СССР</span> в детском питании. На продуктах «Румяные щечки» и «Неженка» выросло не одно  поколение советских детей.</p>
                    </div>
                </div>

                <div class="slide third">
                    <div class="collage">
                        <div class="img-wrapp small-img">
                            <img src="/img/story/1961/2.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="img-wrapp large-img">
                            <img src="/img/story/1961/1.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="description-text">
                        <p>1961 год - Предприятие <span>становится научно-исследовательским институтом</span> по разработке детского питания. По специальному государственному заказу на Одесском заводе детского питания начинается производство продуктов для космической программы: супы, соки, кофе. На заводе <span>изобретен знаменитый колпачок Бушон</span> для упаковки пюре и  жидкой продукции в  тубы.</p>
                    </div>
                </div>

                <div class="slide fourth">
                    <div class="collage">
                        <img src="/img/story/1995/1.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="description-text">
                        <p>1995 год - На заводе впервые в Украине начинают производство соков в картонной упаковке. Происходит <span>модернизация всех мощностей</span> с установкой современного европейского оборудования.</p>
                    </div>
                </div>

                <div class="slide five">
                    <div class="collage">
                        <img src="/img/story/2008/1.png" alt="" class="img-responsive">
                    </div>
                    <div class="description-text">
                        <p>2008 - <span>Соки</span> и нектары из фруктов и овощей собственной переработки,  выращенных на юге Украины, <span>выходят на рынок под ТМ Одесский.</span></p>
                    </div>
                </div>

                <div class="slide six">
                    <div class="collage">
                        <img src="/img/story/2017/1.png" alt="" class="img-responsive">
                    </div>
                    <div class="description-text">
                        <p>2017 - Соки «Одесский» выпускаются <span>в новом современном дизайне</span> упаковки.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="news" class="s-news">
    <h3>НОВОСТИ О НАС</h3>
    <p>Здесь все самое интересное о производстве самых вкусных соков</p>
    <a href="<?=Url::to('site/blogs')?>" class="button">Перейти</a>
</section>

<section id="contacts" class="s-contacts">
    <div class="container">
        <h3>Контакты</h3>
        <div class="row contacts">
            <div class="col-md-4 col-sm-4">
                <div class="description-text">
                    <h4>Написать нам</h4>
                    <p>info@vitmark.com</p>
                    <p class="circle_soc-box">
                        <a href="https://vk.com/sok_odesskiy" target="_blank" class="vk"><i class="soc-box__item fa fa-vk"></i></a>
                        <a href="https://ok.ru/group/53518183104664" target="_blank" class="ok"><i class="soc-box__item fa fa-odnoklassniki"></i></a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="description-text">
                    <h4>Главный офис</h4>
                    <p>Одесский консервный завод детского питания СП «Витмарк-Украина», ООО 65007, Украина, г. Одесса, пер. Высокий, 22</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="description-text">
                    <h4>Телефон</h4>
                    <p>+38 (0482) 34 40 42</p>
                    <p>+38 (0482) 34 40 43</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="description-text">
                    <h4>РЕСПУБЛИКА Беларусь</h4>
                    <p>Импортер и организация, уполномоченная на принятие претензий от потребителей на территории республики Беларусь:</p>
                    <p>ООО "Владпродимпорт", 220036, г. Минск, ул. Западная, 11-А, тел.+37517 512 34 08</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="description-text">
                    <h4>РЕСПУБЛИКА Молдова</h4>
                    <p>Импортер и организация, уполномоченная на принятие претензий от потребителей на Территории молдовы:</p>
                    <p>"Lux Proba" SRL, г. Кишинев, ул. Н. Димо, 21/4, оф. 105 , TeЛ: (+37322) 31-07-07</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="description-text">
                    <h4>Грузия</h4>
                    <p>Импортер и организация, уполномоченная на принятие претензий от потребителей на территории Грузии:</p>
                    <p>LTD "UA GE Foods” г.Батуми, ул. Химшиашвили, 41/26, тел: (+995) 592 755 545  </p>
                </div>
            </div>
        </div>
    </div>
</section>