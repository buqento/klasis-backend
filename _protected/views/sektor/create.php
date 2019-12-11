<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title = 'Tambah Sektor';
$this->params['breadcrumbs'][] = ['label' => 'Sektor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sektor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
