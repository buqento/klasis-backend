<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Biodata */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Biodata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
