<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = 'Detail Unit';
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-view">

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
                [
                    'attribute' => 'sektor_id',
                    'value' => function($data) {
                        return $data->sektor->name;
                    }
                ],
                'name',
            ],
        ]) ?>

        <?php
        function tByUnit($dari, $ke, $jenis_kelamin, $jemaat_id, $sektor_id, $unit_id)
        {
            $result = Yii::$app->db->createCommand('SELECT rangeumur_unit('.$dari.', '.$ke.', '.$jenis_kelamin.', '.$jemaat_id.', '.$sektor_id.', '.$unit_id.')')->queryScalar();
            return $result;
        }
        $jid = $model->jemaat_id;
        $sid = $model->sektor_id;
        $uid = $model->id;

        $r031 = tByUnit(0, 3, 1, $jid, $sid, $uid);
        $r461 = tByUnit(4, 6, 1, $jid, $sid, $uid);
        $r791 = tByUnit(7, 9, 1, $jid, $sid, $uid);
        $r10121 = tByUnit(10, 12, 1, $jid, $sid, $uid);
        $r13151 = tByUnit(13, 15, 1, $jid, $sid, $uid);
        $r17451 = tByUnit(17, 45, 1, $jid, $sid, $uid);
        $r46591 = tByUnit(46, 59, 1, $jid, $sid, $uid);
        $r60851 = tByUnit(60, 85, 1, $jid, $sid, $uid);
        $r861201 = tByUnit(86, 120, 1, $jid, $sid, $uid);

        $r032 = tByUnit(0, 3, 2, $jid, $sid, $uid);
        $r462 = tByUnit(4, 6, 2, $jid, $sid, $uid);
        $r792 = tByUnit(7, 9, 2, $jid, $sid, $uid);
        $r10122 = tByUnit(10, 12, 2, $jid, $sid, $uid);
        $r13152 = tByUnit(13, 15, 2, $jid, $sid, $uid);
        $r17452 = tByUnit(17, 45, 2, $jid, $sid, $uid);
        $r46592 = tByUnit(46, 59, 2, $jid, $sid, $uid);
        $r60852 = tByUnit(60, 85, 2, $jid, $sid, $uid);
        $r861202 = tByUnit(86, 120, 2, $jid, $sid, $uid);
        
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
