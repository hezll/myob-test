<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Dbf */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dbf-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'dbffile')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 1
        ]);
    ?>

    <?php echo $form->field($model, 'published_at')->widget(
        DateTimeWidget::className(),
        [
           // 'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ'
        ]
    ) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
