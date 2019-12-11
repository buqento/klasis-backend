<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Biodatapendeta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="biodatapendeta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Pilih Tanggal'],
                // 'value' => date('dd Y M d'),
                'pluginOptions' => 
                [ 
                    'autoclose' => true, 
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
    ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?php
    $jenis = [1 => 'Laki-laki', 2 => 'Perempuan'];
    ?>
    <?= $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), ['data' => $jenis]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
