<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = $query->title;
$this->params['breadcrumbs'][] = $this->title;
?>
	
<div class='container '>

	<div class=' alert alert-info text-center upper spacing top2'>
		<?=$this->title?>
	</div>

	<div class="col-md-2 " >
		<div class="panel panel-default">
			<div class="panel-heading">
				Дата публикации:
			</div>
			<ul class="list-group">
				<li class="list-group-item"><?=date('d-m-Y H:i', strtotime($query->pub_date))?></li>
			</ul>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Дата загрузки:
			</div>
			<ul class="list-group">
				<li class="list-group-item"><?=date('d-m-Y H:i', strtotime($query->upload_date))?></li>
			</ul>
		</div>
		<p class='redlink'>
			<?=Html::a('Ссылка на оригинал ',Url::to($query->url_guid), ['target'=>'_blank'])?>
		</p>
	</div>

	<div class="col-md-5 text-justify" >
		<p>
			<?=$query->description;?>
		</p>
	</div>

	<div class="col-md-5 text-justify" >
		<p>
			<?=Html::img($query->url_image, [
				'class' => ['img-thumbnail', 'imageZoom'],
				'alt' => $query->title,
				'title' =>  $query->title,
				'tabindex' => '0',
				]);
			?>
		</p>
	</div>
</div>
	
<div class='container '>
<hr>
	<div id='cmtDiv'>
		<div class="col-md-2 text-justify" >
			<div class="panel panel-default">
				<div class="panel-heading">
					Всего комментариев				
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						<?=count($cmtArr)?>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-5 text-justify" >
			<p>
				Комментарии:
			</p>
			<p>
				<? foreach($cmtArr as $cmt){?>
					<div class="panel panel-default">
						<div class="panel-heading">
							Пользователь: 	<?=$cmt['user']?>
						</div>
						<ul class="list-group">
							<li class="list-group-item">
								<?=$cmt['note'];?>
							</li>
						</ul>
					</div><?
				}?>
			</p>
		</div>
	</div>
	<div class="col-md-5 text-justify" >
		Оставте свой комментарий.
		<br><br>
			<div class="form-group" >
				<label form="text">Как вас зовут</label>
				<input type="text" required
						 id='user' class="form-control" placeholder="Как вас зовут" value='550'/>
			</div>

			<div class="form-group" >
				<label form="comment">Ваш комментарий</label>
				<textarea  rows="5" required id='note' class="form-control" placeholder="Как вас зовут" /></textarea>
			</div>

			<div class="form-group">
				<button onClick='insertCmt(<?=Yii::$app->request->get('id')?>)' class="btn btn-default">Добавить</button>
			</div>
	</div>
</div>