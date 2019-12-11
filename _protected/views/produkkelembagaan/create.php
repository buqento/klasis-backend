<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Produkkelembagaan */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Produk Kelembagaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produkkelembagaan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
