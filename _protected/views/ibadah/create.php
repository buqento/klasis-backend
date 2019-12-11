<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ibadah */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Ibadah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibadah-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
