<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img_url')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]);
    ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?php
        echo $form->field($model, 'show')->widget(Select2::classname(), [
            'data' => ['1' => 'Ya', '0' => 'Tidak'],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
