<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usaha */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Usaha', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usaha-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
