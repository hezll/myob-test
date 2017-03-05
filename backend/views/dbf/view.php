<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Dbf */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dbfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dbf-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
           // 'id',
            'name',
            'company',
            'description',
            'published_at:datetime', // publish date formatted as datetime
            'created_at:datetime', // creation date formatted as datetime
            'updated_at:datetime', // update date formatted as datetime
        ],
    ]) ?>

    <?php if (!empty($model->path)): ?>
        <h3><?php echo Yii::t('backend', 'Dbf') ?></h3>
        <ul id="article-attachments">
                <li>
                    <?php echo \yii\helpers\Html::a(
                        $model->name,
                        ['dbf-download', 'id' => $model->id])
                    ?>
                    (<?php echo Yii::$app->formatter->asSize($model->size) ?>)
                </li>
        </ul>
    <?php endif; ?>

</div>
