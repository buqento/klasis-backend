<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Jemaat;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $jemaats = Jemaat::find()->select('nama_jemaat')->indexBy('id')->column();
    echo $form->field($model, 'jemaat_id')->widget(Select2::classname(), [
        'data' => $jemaats,
        'options' => ['id' => 'jemaat-id', 'prompt' => 'Pilih Jemaat'],
    ]);?>

    <?php
    echo $form->field($model, 'sektor_id')->widget(DepDrop::classname(), [
        'type'=>DepDrop::TYPE_SELECT2,
        'options'=>['prompt' => 'Pilih Sektor'],
        'pluginOptions'=>[
            'depends'=>['jemaat-id'],
            'placeholder'=>'Pilih Sektor',
            'url'=>Url::to(['/unit/sektor']),
            'loadingText'=>'Loading...',
        ],

    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
