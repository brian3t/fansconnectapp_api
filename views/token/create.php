<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Token */

$this->title = 'Create Token';
$this->params['breadcrumbs'][] = ['label' => 'Token', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="token-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
