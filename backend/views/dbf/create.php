<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dbf */

$this->title = 'Create Dbf';
$this->params['breadcrumbs'][] = ['label' => 'Dbfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dbf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
