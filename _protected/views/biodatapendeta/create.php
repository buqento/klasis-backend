<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Biodatapendeta */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Biodata Pendeta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodatapendeta-create">
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
