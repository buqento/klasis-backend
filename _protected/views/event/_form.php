<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Jemaat;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $jemaats = Jemaat::find()->select('nama_jemaat')->indexBy('id')->column();
    echo $form->field($model, 'jemaat_id')->widget(Select2::classname(), [
        'data' => $jemaats,
        'options' => ['placeholder' => 'Pilih Jemaat'],
    ]);?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'tanggal_jam')->widget(DateTimePicker::classname(), [
                'options' => 
                [
                    'placeholder' => 'Pilih Tanggal & Jam'
                ],
                'readonly' => true,
                'removeButton' => false,
                // 'pickerButton' => ['icon' => 'time'],
                'pluginOptions' => 
                [ 
                    'autoclose' => true, 
                    'todayHighlight' => true, 
                    'startDate' => date('Y-m-d H:i:s'),
                    // 'endDate' => '+7d',
                ]
            ]);
    ?>

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 3]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
