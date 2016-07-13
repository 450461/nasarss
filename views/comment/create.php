<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = $query->title;
$this->params['breadcrumbs'][] = $this->title;
?>
	
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