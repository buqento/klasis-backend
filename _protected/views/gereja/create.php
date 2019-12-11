<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gereja */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Gereja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gereja-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
