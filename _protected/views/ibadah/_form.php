<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Biodatapendeta;
use app\models\Gereja;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Ibadah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ibadah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $pelayans = Biodatapendeta::find()->select('nama')->indexBy('id')->column();
    ?>
    
    <?= $form->field($model, 'pelayan_id')->widget(Select2::classname(), ['data' => $pelayans] ) ?>

    <?php
    $gerejas = Gereja::find()->select('name')->indexBy('id')->column();
    ?>

    <?= $form->field($model, 'gereja_id')->widget(Select2::classname(), ['data' => $gerejas] ) ?>

    <?= $form->field($model, 'waktu')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal Lahir'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd HH:i',
            'todayHighlight' => true,
            'autoclose'=>true,
        ]
    ]);
    ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
