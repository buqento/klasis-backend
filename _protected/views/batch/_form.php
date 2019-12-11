<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Batch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="batch-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'file_import')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Import', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
