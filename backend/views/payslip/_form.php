<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'username')->hint('Please enter your name') ?>
    <?php echo $form->field($model, 'salary')->hint('Please enter your salary') ?>
    <?php echo $form->field($model, 'month')->dropdownList($model->getMonthlist()); ?>
    <?php echo $form->field($model, 'rate')->hint('Please enter your rate like 0.09 or 0.1') ?>
    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
