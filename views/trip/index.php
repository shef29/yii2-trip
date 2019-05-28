<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchTrip */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-3">
            <p>
                <?= Html::a('Create Trip', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="col-md-9">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'corporate_id',
            'service_id',
            'number',
            [
                'attribute' => 'value',
                'label' => 'Airport',
                'value' => 'value',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
