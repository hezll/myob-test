<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



$this->title = 'Employee Payslip';
$this->params['breadcrumbs'][] = ['label' => 'Payslip', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payslip-create">

    <?= $this->render('_form',['model'=>$model]) ?>

<?php if(isset($create)){ ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'payPeriod',
            'grossIncome',
            'incomeTax',
            'netIncome',
            'super'
        ],
    ]) ?>
    <?php   }  ?>


</div>
