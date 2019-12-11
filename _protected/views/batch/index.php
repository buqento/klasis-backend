<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Import Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-index">

    <p>
        <?= Html::a('Import Biodata', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-download"></i> Download Template Biodata', 'https://klasiskotaambon.org/template_biodata.csv', ['class' => 'btn btn-primary', 'target'=> '_BLANK']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'file_import',
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
