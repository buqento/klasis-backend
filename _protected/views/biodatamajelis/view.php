<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Biodatamajelis */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Biodata Majelis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodatamajelis-view">
    <div class="col-md-3">
        <img class="img-thumbnail" src="<?= $model->foto ?>">
    </div>
    <div class="col-md-9">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'nama',
                'tempat_lahir',
                'tanggal_lahir',
                'jabatan',
                'alamat',
                'telepon',
                'email:email',
                // 'foto:ntext',
                [
                    'attribute' => 'pendidikan_id',
                    'value' => function($data) {
                        return $data->pendidikan->name;
                    }
                ],
                'pekerjaan',
                'keterangan',
                'status_aktif',
                'created_at:datetime',
            ],
        ]) ?>
    </div>

</div>
