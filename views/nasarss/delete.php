<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Comment;

$this->title = $query->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- див для обновления информации в таблице без перезагрузки страницы-->
<div id='table'>
	<div class="col-md-10" >
		<?= GridView::widget([
								'dataProvider' => $provider,
								'summary' => false,
								'filterModel' => $searchModel,
								'columns' => [
									['attribute' => 'id',
										'format' => 'text',
										'label' => 'ID',
										'options' => ['width' => '3%'],
									],
									['attribute' => 'title',
										'format' => 'raw',
										'label' => 'Заголовок',
										'options' => ['width' => '45%'],
										'value' =>  function($item) {
											return Html::a($item->title, Url::to("/nasarss/view?id=$item->id"));
										},
									],
									['attribute' => 'pub_date',
										'format' => ['date', 'php:d-m-Y H:i'],
										'label' => 'Дата публикации',
										'options' => ['width' => '15%'],
									],
									['attribute' => 'upload_date',
										'format' => ['date', 'php:d-m-Y H:i'],
										'label' => 'Дата загрузки',
										'options' => ['width' => '15%'],
									],
									['header' => 'Комметарии',
										'value' => function($item) {
											$tst = Comment::find()->where(['ext_id' =>$item->id])->all();
											return count($tst);
										},
										'options' => ['width' => '3%'],
									],
									['class' => 'yii\grid\ActionColumn', 
										'header'=>'Действия', 
										'headerOptions' => ['width' => '15%'],
										'contentOptions'=>[
											'class'=>'edit-link',
										],
										'template' => '{update} {delete}',
										'controller' => 'nasarss',
										'buttons' => [
											'update' => function ($url,$model) {
												return Html::a(
												'Изменить', 
												$url);
											},
											'delete' => function ($url, $model) {
												return Html::a('Удалить', 
													$url, [
														'title' => \Yii::t('yii', 'Delete'), 
														'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'), 
														'data-method' => 'post', 
														'data-pjax' => '0', 
														]
													);
											}
										],
										
									],									
								],
							]);
		?>	
	</div>

	<div class="col-md-2" >
		<div class="panel panel-default">
			<div class="panel-heading">
				Количество статей
			</div>
			<ul class="list-group">
				<li class="list-group-item"><?=$count?></li>
			</ul>
		</div>
	</div>
</div>