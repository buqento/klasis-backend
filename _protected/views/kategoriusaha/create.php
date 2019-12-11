<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kategoriusaha */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Usaha', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoriusaha-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
