<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\chartjs\ChartJs;  

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title = 'Detail Sektor';
$this->params['breadcrumbs'][] = ['label' => 'Sektor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sektor-view">

    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                [
                    'attribute' => 'jemaat_id',
                    'value' => function($data) {
                        return $data->jemaat->nama_jemaat;
                    }
                ],
                'name',
            ],
        ]) ?>

        <?php
        function tBySektor($dari, $ke, $jenis_kelamin, $jemaat_id, $sektor_id)
        {
            $result = Yii::$app->db->createCommand('SELECT rangeumur_sektor('.$dari.', '.$ke.', '.$jenis_kelamin.', '.$jemaat_id.', '.$sektor_id.')')->queryScalar();
            return $result;
        }
        $jid = $model->jemaat_id;
        $sid = $model->id;

        $r031 = tBySektor(0, 3, 1, $jid, $sid);
        $r461 = tBySektor(4, 6, 1, $jid, $sid);
        $r791 = tBySektor(7, 9, 1, $jid, $sid);
        $r10121 = tBySektor(10, 12, 1, $jid, $sid);
        $r13151 = tBySektor(13, 15, 1, $jid, $sid);
        $r17451 = tBySektor(17, 45, 1, $jid, $sid);
        $r46591 = tBySektor(46, 59, 1, $jid, $sid);
        $r60851 = tBySektor(60, 85, 1, $jid, $sid);
        $r861201 = tBySektor(86, 120, 1, $jid, $sid);

        $r032 = tBySektor(0, 3, 2, $jid, $sid);
        $r462 = tBySektor(4, 6, 2, $jid, $sid);
        $r792 = tBySektor(7, 9, 2, $jid, $sid);
        $r10122 = tBySektor(10, 12, 2, $jid, $sid);
        $r13152 = tBySektor(13, 15, 2, $jid, $sid);
        $r17452 = tBySektor(17, 45, 2, $jid, $sid);
        $r46592 = tBySektor(46, 59, 2, $jid, $sid);
        $r60852 = tBySektor(60, 85, 2, $jid, $sid);
        $r861202 = tBySektor(86, 120, 2, $jid, $sid);
        
        $dLdetail = "$r031,$r461,$r791,$r10121,$r13151,$r17451,$r46591,$r60851,$r861201";
        $rLdetail = explode(",",$dLdetail);
        $dPdetail = "$r032,$r462,$r792,$r10122,$r13152,$r17452,$r46592,$r60852,$r861202";
        $rPdetail = explode(",",$dPdetail);

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
                        'backgroundColor' => "#CFD8DC",
                        'borderColor' => "#ECEFF1",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => $rLdetail
                    ],

                    [
                        'label' => "Perempuan",
                        'backgroundColor' => "#F8BBD0",
                        'borderColor' => "#FCE4EC",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => $rPdetail
                    ],
                ]
            ]
        ]);
        ?>

    </div>
</div>
