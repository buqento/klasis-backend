<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slide */

$this->title = 'Tambah Slide';
$this->params['breadcrumbs'][] = ['label' => 'Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
