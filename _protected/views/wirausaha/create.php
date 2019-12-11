<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wirausaha */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Kewirausahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wirausaha-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
