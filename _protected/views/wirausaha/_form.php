<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Biodata;
use app\models\KategoriUsaha;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Wirausaha */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wirausaha-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $biodatas = Biodata::find()->select('nama')->indexBy('id')->column();
    ?>
    <?= $form->field($model, 'biodata_id')->widget(Select2::classname(), [
    	'data' => $biodatas
    ]) ?>

    <?php
    $kategoris = KategoriUsaha::find()->select('name')->indexBy('id')->column();
    ?>
    <?= $form->field($model, 'kategori_usaha_id')->widget(Select2::classname(), [
    	'data' => $kategoris,
    	'options' => ['id' => 'kategori-id', 'prompt' => 'Pilih Kategori'],
    ]) ?>

    <?= $form->field($model, 'usaha_id')->widget(DepDrop::classname(), [
	    'type'=>DepDrop::TYPE_SELECT2,
	    'options'=>['prompt' => 'Pilih Jenis Usaha'],
	    'pluginOptions'=>[
	        'depends'=>['kategori-id'],
	        'placeholder'=>'Pilih Jenis Usaha',
	        'url'=>Url::to(['/wirausaha/usaha']),
	        'loadingText'=>'Loading...',
	    ],

	]);
	?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
