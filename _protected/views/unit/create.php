<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = 'Tambah Unit';
$this->params['breadcrumbs'][] = ['label' => 'Unit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
