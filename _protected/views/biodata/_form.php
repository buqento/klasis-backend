<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Pendidikan;
use app\models\Pekerjaan;
use app\models\Jemaat;
use app\models\Sektor;
use app\models\Cacat;
use app\models\Unit;
use app\models\Golongan;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;

?>

<div class="biodata-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?php
        echo $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), [
            'data' => ['1' => 'Laki-laki', '2' => 'Perempuan'],
        ]);?>

        <?= $form->field($model, 'tempat_lahir')->textInput() ?>

        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal Lahir'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-m-d',
            ]
        ]);
        ?>

        <?php
        $golongans = Golongan::find()->select('name')->indexBy('id')->column();

        echo $form->field($model, 'golongan_id')->widget(Select2::classname(), [
            'data' => $golongans,
        ]);?>

        <?= $form->field($model, 'alamat')->textarea(['row' => 2]) ?>

    </div>

    <div class="col-md-4">

        <?php
        $pendidikans = Pendidikan::find()->select('name')->indexBy('id')->column();
        echo $form->field($model, 'pendidikan_id')->widget(Select2::classname(), [
            'data' => $pendidikans,
        ]);?>
        
        <?php
        $cacats = Cacat::find()->select('name')->indexBy('id')->column();
        echo $form->field($model, 'cacat_id')->widget(Select2::classname(), [
            'data' => $cacats,
        ]);?>

        <?php
        $pekerjaans = Pekerjaan::find()->select('name')->indexBy('id')->column();
        echo $form->field($model, 'pekerjaan_id')->widget(Select2::classname(), [
            'data' => $pekerjaans,
        ]);?>

        <?php
        $jemaats = Jemaat::find()->select('nama_jemaat')->indexBy('id')->column();
        echo $form->field($model, 'jemaat_id')->widget(Select2::classname(), [
            'data' => $jemaats,
            'options' => ['id' => 'jemaat-id', 'prompt' => 'Pilih Jemaat'],
        ]);?>

        <?php
        echo $form->field($model, 'sektor_id')->widget(DepDrop::classname(), [
            'type'=>DepDrop::TYPE_SELECT2,
            'options'=>['id' => 'sektor-id', 'prompt' => 'Pilih Sektor'],
            'pluginOptions'=>[
                'depends'=>['jemaat-id'],
                'placeholder'=>'Pilih Sektor',
                'url'=>Url::to(['/biodata/sektor']),
                'loadingText'=>'Loading...',
            ],

        ]);
        ?>

        <?php
        echo $form->field($model, 'unit_id')->widget(DepDrop::classname(), [
            'type'=>DepDrop::TYPE_SELECT2,
            'options'=>['prompt' => 'Pilih Unit'],
            'pluginOptions'=>[
                'depends'=>['sektor-id'],
                'placeholder'=>'Pilih Unit',
                'url'=>Url::to(['/biodata/unit']),
                'loadingText'=>'Loading...',
            ],

        ]);
        ?>

    </div>

    <div class="col-md-4">

        <?php
        $datas = [0 => 'Belum', 1 => 'Menikah'];
        echo $form->field($model, 'status_pernikahan')->widget(Select2::classname(), [
            'data' => $datas,
        ]);?>

        <?php
        $datas = [0 => 'Belum', 1 => 'Sudah'];
        echo $form->field($model, 'status_baptis')->widget(Select2::classname(), [
            'data' => $datas,
        ]);?>

        <?php
        $datas = [0 => 'Belum', 1 => 'Sudah'];
        echo $form->field($model, 'status_sidi')->widget(Select2::classname(), [
            'data' => $datas,
        ]);?>

        <?php
        $datas = [1 => 'Hidup', 0 => 'Almarhum'];
        echo $form->field($model, 'status_hidup')->widget(Select2::classname(), [
            'data' => $datas,
        ]);?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
