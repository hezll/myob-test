<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Invoice */

$this->title = $model->invoice_number;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->invoice_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->invoice_number], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'invoice_number',
            'invoice_date',
            'charge_to',
            'deliver_to',
            'invoice_total',
        ],
    ]) ?>

    <?php


    $dataProvider = new ActiveDataProvider([
        'query' => $model->getProducts(),
    ]);

    echo  GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_code',
            'cat',
            'inds',
            'description',
            'size',
            // 'pack_qty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
