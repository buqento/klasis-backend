<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Mutiarapagi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mutiarapagi-form">

    <?php $form = ActiveForm::begin(); ?>





    <?php 

    echo $form->field($model, 'tanggal_tampil')->widget(DatePicker::classname(),[
	'name' => 'check_issue_date', 
	'value' => date('d-M-Y', strtotime('+2 days')),
	'options' => ['placeholder' => 'Pilih tanggal tampil...'],
	'pluginOptions' => [
		'autoclose' => true,
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
	]
]);
      
    ?>

    <?= $form->field($model, 'konten')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
