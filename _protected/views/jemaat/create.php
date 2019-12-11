<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jemaat */

$this->title = 'Tambah Jemaat';
$this->params['breadcrumbs'][] = ['label' => 'Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
