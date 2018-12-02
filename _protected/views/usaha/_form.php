<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\KategoriUsaha;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Usaha */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usaha-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $kategoris = KategoriUsaha::find()->select('name')->indexBy('id')->column();
    ?>
    <?= $form->field($model, 'kategori_usaha_id')->widget(Select2::classname(), [
    	'data' => $kategoris
    ]) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
