<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

Yii::setAlias('@images', dirname(dirname(dirname(__DIR__))) . '/web/img/');
?>

<?php foreach ($blogs as $blog):?>
<section id="about-us-0" class="s-about-us blog-section">
    <div class="container">
        <div class="row blog-post-child">
            <div class=" hidden-lg hidden-md hidden-sm col-xs-12 ">
                <div class="blog-img-wrapper">
                    <img src="/img/blog/<?=$blog->image->name?>" class="img-responsive" alt="<?=$blog->image->name?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12  ">
                <div class="description-text-blog">

                    <div class="text-group">
                        <h2><?=$blog->title?></h2>
                        <?=$blog->getShort()?>
                        <h6 class="publication-date"> <?= Yii::$app->formatter->asDate($blog->created_at, 'd MMMM yyyy') .' г.'?></h6>
                    </div>
                </div>
                <div class="btn-group green-btns-group">
                    <a href="<?=Url::toRoute(['site/blog', 'id' => $blog->id]);?>" class="btn btn-default btn-green"> <span class="counter">Read More</span></a>
                    <div class="social"> <!-- uSocial -->
                        <script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
                        <div class="uSocial-Share" data-pid="c5098f007b359b424833d9b7619db99d" data-type="share" data-options="round,style1,default,absolute,horizontal,size32,counter0" data-social="vk,ok" data-mobile="vi,wa,sms"></div>
                        <!-- /uSocial --></div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 visible-lg visible-md visible-sm col-xs-12 ">
                <div class="blog-img-wrapper">
                    <img src="/img/blog/<?=$blog->image->name?>" class="img-responsive" alt="<?=$blog->image->name?>">
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach;?>

<!-- even END -->

<section id="pagintion" class="s-about-us  green-line ">
    <div class="container" >
        <div class="row">
            <div style="text-align: center">
                <?php echo LinkPager::widget([
                    'pagination' => $pages,
                ]);?>
            </div>
        </div>
    </div>
</section>