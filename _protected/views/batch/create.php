<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Batch */

$this->title = 'Import Biodata';
$this->params['breadcrumbs'][] = ['label' => 'Import Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
