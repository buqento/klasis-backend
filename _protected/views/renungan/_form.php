<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Renungan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="renungan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
        $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
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

    <?= $form->field($model, 'ayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perikop')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'konten')->widget(TinyMce::className(), [
        'options' => ['rows' => 10],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
