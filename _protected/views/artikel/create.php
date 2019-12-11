<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Artikel */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
