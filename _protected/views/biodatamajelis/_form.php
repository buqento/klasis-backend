<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pendidikan;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\file\FileInput;
?>

<div class="biodatamajelis-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>
        
        <?php
        echo $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), [
            'data' => ['1' => 'Laki-laki', '2' => 'Perempuan'],
        ]);?>

        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal Lahir'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-m-d',
            ]
        ]);
        ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    </div>

    <div class="col-md-6">

        <?= $form->field($model, 'foto')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]);
        ?>

        <?php
        $pendidikans = Pendidikan::find()->select('name')->indexBy('id')->column();
        echo $form->field($model, 'pendidikan_id')->widget(Select2::classname(), [
            'data' => $pendidikans,
        ]);?>

        <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
