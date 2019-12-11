<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Renungan */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Renungan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="renungan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
