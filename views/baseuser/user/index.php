<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php 
    $gridColumn = [
        ['attribute' => 'id'],
        ['attribute'=>'username',
            'value' => function($model){
                return "<a href=/baseuser/update?id={$model->id}>{$model->username}</a>";
            },
            'format'=>'html'
            ],
        [
                'attribute' => 'company_id',
                'label' => 'Company',
                'value' => function($model){
                    return $model->company->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid--company_id']
            ],
        'job_title',
        'email:email',
        'registration_ip',
        'created_at:datetime',
        'updated_at:datetime',
        'first_name',
        'last_name',
        'line_of_business',
        'union_memberships',
        ['attribute'=>'phone_number_type','label'=>'Phone Type'],
        ['attribute'=>'phone_number','label'=> 'Phone'],
        'birthdate:date',
        'website_url:url',
        [
            'attribute' => 'belong_company_id',
            'label' => 'Belongs to',
            'value' => function($model){
                return $model->belongCompany->name??'';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid--belong_company_id']
        ],[
            'class' => 'yii\grid\ActionColumn',
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
