<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Biodatapendeta */

$this->title = 'Ubah Data';
$this->params['breadcrumbs'][] = ['label' => 'Biodata Pendeta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biodatapendeta-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
