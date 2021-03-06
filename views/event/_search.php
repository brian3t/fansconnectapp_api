<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline']
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'source')->widget(\kartik\widgets\Select2::class, [
        'data' => ['sdr'=>'San Diego Reader (sdr)','ticketfly'=>'TicketFly','reverb'=>'Reverb','tickmas'=>'Ticket Master (tickmas)','skick'=>'Songkick','other'=>'Other','unknown'=>'Unknown'],
        'options' => ['placeholder' => 'Choose Source'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'venue_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Venue'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /* echo $form->field($model, 'when')->textInput(['maxlength' => true, 'placeholder' => 'When']) */ ?>

    <?php /* echo $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) */ ?>

    <?php /* echo $form->field($model, 'short_desc')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'description')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'img')->textInput(['maxlength' => true, 'placeholder' => 'Img']) */ ?>

    <?php /* echo $form->field($model, 'cost')->textInput(['maxlength' => true, 'placeholder' => 'Cost']) */ ?>

    <?php /* echo $form->field($model, 'min_cost')->textInput(['maxlength' => true, 'placeholder' => 'Min Cost']) */ ?>

    <?php /* echo $form->field($model, 'max_cost')->textInput(['maxlength' => true, 'placeholder' => 'Max Cost']) */ ?>

    <?php /* echo $form->field($model, 'is_charity')->textInput(['placeholder' => 'Is Charity']) */ ?>

    <?php /* echo $form->field($model, 'age_limit')->textInput(['maxlength' => true, 'placeholder' => 'Age Limit']) */ ?>

    <?php /* echo $form->field($model, 'twitter')->textInput(['maxlength' => true, 'placeholder' => 'Twitter']) */ ?>

    <?php /* echo $form->field($model, 'facebook')->textInput(['maxlength' => true, 'placeholder' => 'Facebook']) */ ?>

    <?php /* echo $form->field($model, 'website')->textInput(['maxlength' => true, 'placeholder' => 'Website']) */ ?>

    <?php /* echo $form->field($model, 'system_note')->textInput(['maxlength' => true, 'placeholder' => 'System Note']) */ ?>

    <?php /* echo $form->field($model, 'sdr_name')->textInput(['maxlength' => true, 'placeholder' => 'Sdr Name']) */ ?>

    <?php /* echo $form->field($model, 'temp')->textInput(['maxlength' => true, 'placeholder' => 'Temp']) */ ?>

    <?php /* echo $form->field($model, 'source')->dropDownList([ 'sdr' => 'Sdr', 'ticketfly' => 'Ticketfly', 'other' => 'Other', 'unknown' => 'Unknown', 'reverb' => 'Reverb', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'attr')->textInput(['placeholder' => 'Attr']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
