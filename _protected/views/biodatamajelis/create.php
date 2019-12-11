<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Biodatamajelis */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Biodata Majelis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodatamajelis-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
