<?php
use yii\helpers\Url;
?>


<section id="blog">
    <div class="container " style="padding-top: 18rem;padding-bottom: 78px;" data-id="588">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="border-right: 1px solid #007B45;">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 for-single-post-text bounceInUp" style="-webkit-animation-duration: 1s; animation-duration: 1s;  -webkit-animation-fill-mode: both;animation-fill-mode: both;">
                    <div class="description-text-blog">

                        <div class="text-group">
                            <h2><?= $model->title?></h2>
                            <?=$model->text?>
                            <h6 class="publication-date"> <?= Yii::$app->formatter->asDate($model->created_at, 'd MMMM yyyy') .' г.'?></h6>
                        </div>
                    </div>
                    <div class="btn-group green-btns-group">
                        <!-- uSocial -->
                        <script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
                        <div class="uSocial-Share" data-pid="c5098f007b359b424833d9b7619db99d" data-type="share" data-options="round,style1,default,absolute,horizontal,size32,counter0" data-social="vk,ok" data-mobile="vi,wa,sms"></div>
                        <!-- /uSocial -->
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="news-list-for-post-page">
                    <h3>Последнии новости</h3>
                    <?php foreach ($blogs as $blog):?>
                    <div id="585" class="col-xs-12 col-sm-5 col-md-12 col-lg-12 media item blog-single-post-list-padding bounceInUp" style="-webkit-animation-duration: 1s; animation-duration: 1s;  -webkit-animation-fill-mode: both;animation-fill-mode: both; border-bottom: 1px solid #007B45;">
                        <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <a href="/" title="Снятие фильтров">
                                <img width="150" height="150" src="/img/blog/<?=$blog->image->name?>" class=" Responsive image wp-post-image" alt="">                                        </a>
                        </div>
                        <div class="inner__text col-xs-12 col-sm-12   col-md-8 col-lg-8">
                            <a target="_blank" href="<?=Url::toRoute(['site/blog', 'id' => $blog->id]);?>"><h4 class="media-heading-single-post top-margin-for-blog-post "><?=$blog->title?></h4></a>
                            <p class="text-excerpt">
                                <?=$blog->getDescription()?>                                 </p>
                            <a class="btn-red btn-arr btn-link-single-post" style="" href="<?=Url::toRoute(['site/blog', 'id' => $blog->id]);?>" tabindex="0">Подробности</a>
                        </div>

                    </div>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </div>


</section>