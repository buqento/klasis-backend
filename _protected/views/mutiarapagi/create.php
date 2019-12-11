<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mutiarapagi */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Mutiara pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mutiarapagi-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
