<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Biodata */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Biodata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-view">
    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin akan menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'nama',
            [
                'attribute' => 'jenis_kelamin',
                'value' => 
                    function($data)
                        {
                            switch ($data->jenis_kelamin) {
                                case 1:
                                    $jenis_kelamin = 'Laki-laki';
                                    break;
                                default:
                                    $jenis_kelamin = 'Perempuan';
                                    break;
                            }
                            return $jenis_kelamin;
                        }
            ], 
            'tempat_lahir',
            'tanggal_lahir:date',
            [
                'attribute' => 'golongan_id',
                'value' => function($data){
                    return $data->golongan->name;
                }
            ],
            [
                'attribute' => 'Umur',
                'value' => function($data){
                    $tanggalLahir = new DateTime($data->tanggal_lahir);
                    $toDay = new DateTime();
                    $diff = $toDay->diff($tanggalLahir);
                    return $diff->y .' Tahun';
                }
            ],
            [
                'attribute' => 'pendidikan_id',
                'value' => function($data) {
                    return $data->pendidikan->name;
                }
            ],
            'alamat',
            [
                'attribute' => 'cacat_id',
                'value' => function($data) {
                    return $data->cacat->name;
                }
            ],
            [
                'attribute' => 'pekerjaan_id',
                'value' => function($data) {
                    return $data->pekerjaan->name;
                }
            ],
            [
                'attribute' => 'jemaat_id',
                'value' => function($data) {
                    return $data->jemaat->nama_jemaat;
                }
            ],
            [
                'attribute' => 'sektor_id',
                'value' => function($data) {
                    return $data->sektor->name;
                }
            ],
            [
                'attribute' => 'unit_id',
                'value' => function($data) {
                    return $data->unit->name;
                }
            ],
            [
                'attribute' => 'status_pernikahan',
                'value' => 
                    function($data)
                        {
                            switch ($data->status_pernikahan) {
                                case 0:
                                    $status = 'Belum';
                                    break;
                                default:
                                    $status = 'Sudah';
                                    break;
                            }
                            return $status;
                        }
            ],
            [
                'attribute' => 'status_baptis',
                'value' => 
                    function($data)
                        {
                            switch ($data->status_baptis) {
                                case 0:
                                    $status = 'Belum';
                                    break;
                                default:
                                    $status = 'Sudah';
                                    break;
                            }
                            return $status;
                        }
            ],
            [
                'attribute' => 'status_sidi',
                'value' => 
                    function($data)
                        {
                            switch ($data->status_sidi) {
                                case 0:
                                    $status = 'Belum';
                                    break;
                                default:
                                    $status = 'Sudah';
                                    break;
                            }
                            return $status;
                        }
            ],
            // 'status_hidup',
            'created_at:datetime'
        ],
    ]) ?>

</div>
