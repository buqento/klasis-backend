<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Jemaat;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Gereja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gereja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    $jemaats = Jemaat::find()->select('nama_jemaat')->indexBy('id')->column();
    ?>

    <?= $form->field($model, 'jemaat_id')->widget(Select2::classname(), ['data' => $jemaats]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
