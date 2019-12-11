<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\Jemaat */

$this->title = 'Detail Jemaat';
$this->params['breadcrumbs'][] = ['label' => 'Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-view">
    <div class="col-md-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'nama_jemaat',
                'nama_gereja',
                'alamat',
                'telepon',
                'email:email',
                'visi',
                'misi',

                // 'gambar:ntext',
                // 'created_at',
            ],
        ]) ?>
    </div>
    <div class="col-md-4">
        <img class="img-thumbnail" src="<?= $model->gambar ?>">
    </div>


    <div class="col-md-8">
        <?php

            $dL = "$r031_16,$r461_16,$r791_16,$r10121_16,$r13151_16,$r17451_16,$r46591_16,$r60851_16,$r861201_16";
            $rL = explode(",",$dL);

            $dP = "$r032_16,$r462_16,$r792_16,$r10122_16,$r13152_16,$r17452_16,$r46592_16,$r60852_16,$r861202_16";
            $rP = explode(",",$dP);

            ?>

            <?= ChartJs::widget([
                'type' => 'bar',
                'options' => [
                    'height' => 227,
                    'width' => 400
                ],
                'data' => [
                    'labels' => ['0-3', '4-6', '7-9', '10-12', '13-15', '17-45', '46-59', '60-85', '> 86'],
                    'datasets' => [
                        [
                            'label' => "Laki-laki",
                            'backgroundColor' => "#607D8B",
                            'borderColor' => "#ECEFF1",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $rL
                        ],

                        [
                            'label' => "Perempuan",
                            'backgroundColor' => "#E91E63",
                            'borderColor' => "#FCE4EC",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $rP
                        ],
                    ]
                ]
            ]);
        ?>
    </div>

</div>
