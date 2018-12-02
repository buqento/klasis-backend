<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Jemaat;
use app\models\KategoriProduk;
use kartik\select2\Select2;
use kartik\file\FileInput;
?>

<div class="produkkelembagaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $kategoris = KategoriProduk::find()->select('name')->indexBy('id')->column();
    echo $form->field($model, 'kategori_id')->widget(Select2::classname(), [
        'data' => $kategoris,
        'options' => ['placeholder' => 'Pilih Kategori'],
    ]);?>

    <?php
    $jemaats = Jemaat::find()->select('nama_jemaat')->indexBy('id')->column();
    echo $form->field($model, 'jemaat_id')->widget(Select2::classname(), [
        'data' => $jemaats,
        'options' => ['placeholder' => 'Pilih Jemaat'],
    ]);?>

    <?= $form->field($model, 'nama_file')->widget(FileInput::classname(), [
        // 'options' => ['accept' => 'image/*'],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
