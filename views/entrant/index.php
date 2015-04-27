<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Robot;
use app\models\Event;
use app\models\EntrantSearch;
use app\models\User;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entrants';
$this->params['breadcrumbs'][] = $this->title;

$searchModel = New EntrantSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<div class="entrant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::a('Create Entrant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
				'attribute' => 'eventId',
				'label' => 'Event',
				'filter' => Event::dropdown(),
				'value' => function($model, $index, $dataColumn) {
					$eventDropdown = Event::dropdown();
					return $eventDropdown[$model->eventId];
				},
			],
            [
				'attribute' =>'robot.name',
				'label' => 'Robot',
				'value' => function($model, $index, $dataColumn) {
					$robotDropdown = Robot::dropdown();
					return $robotDropdown[$model->robotId];
				},
			],
			[
				'attribute' => 'robot.team.username',
				'label' => 'Team',
				'filter' => User::teamDropdown(),
				'value' => function($model, $index, $dataColumn) {
					$teamDropdown = User::teamDropdown();
					return $teamDropdown[$model->robot->teamId];
				},
			],
            'status',

            [
				'class' => 'yii\grid\ActionColumn',
				'buttons' =>
				[
					'delete' => function ($url, $model, $key)
					{
						return (User::isUserAdmin() && $model->isEditable($model->eventId)) ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => 'Delete']) : '';
					},
					'update' => function ($url, $model, $key)
					{
						return (User::isUserAdmin() && $model->isEditable($model->eventId)) ? Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'Update']) : '';
					},
				],
			],
        ],
    ]);

		echo '<p>';
		echo 'Number of entries: ' . $dataProvider->count . '<br>';
		echo '</p>';
	?>

</div>
