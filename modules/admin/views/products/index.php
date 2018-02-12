<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Products\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'category',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {view}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
