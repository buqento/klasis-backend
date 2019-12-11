<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wirausaha */

$this->title = 'Update Data';
$this->params['breadcrumbs'][] = ['label' => 'Kewirausahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wirausaha-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
