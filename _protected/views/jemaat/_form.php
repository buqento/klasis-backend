<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Jemaat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">

        <?= $form->field($model, 'nama_jemaat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama_gereja')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'visi')->textarea(['rows' => 3]) ?>

    </div>

    <div class="col-md-6">

        <?= $form->field($model, 'misi')->textarea(['rows' => 3]) ?>

        <?= $form->field($model, 'gambar')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
