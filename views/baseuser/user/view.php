<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'User'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        [
            'attribute' => 'company.name',
            'label' => 'Company',
        ],
        'email:email',
        'password_hash',
        'auth_key',
        'confirmed_at',
        'unconfirmed_email:email',
        'blocked_at',
        'registration_ip',
        'created_at',
        'updated_at',
        'flags',
        'first_name',
        'last_name',
        'job_title',
        'line_of_business',
        'union_memberships',
        'note',
        'phone_number_type',
        'phone_number',
        'birthdate',
        'website_url:url',
        'twitter_id',
        'facebook_id',
        'instagram_id',
        'google_id',
        'yahoo_id',
        'linkedin_id',
        'work_phone',
        'mobile_phone',
        'home_phone',
        'address1',
        'address2',
        'city',
        'state',
        'zipcode',
        'country',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerSocialAccount->totalCount){
    $gridColumnSocialAccount = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'provider',
            'client_id',
            'data:ntext',
            'code',
            'created_at',
            'email:email',
            'username',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSocialAccount,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-social-account']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Social Account'),
        ],
        'columns' => $gridColumnSocialAccount
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerToken->totalCount){
    $gridColumnToken = [
        ['class' => 'yii\grid\SerialColumn'],
                        'code',
            'created_at',
            'type',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerToken,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-token']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Token'),
        ],
        'columns' => $gridColumnToken
    ]);
}
?>
    </div>
</div>