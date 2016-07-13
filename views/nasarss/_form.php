<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

define('EDITABLE', 'поле доступно для изменения');
?>

<div class="nasarss-form">
   <?php $form = ActiveForm::begin(); ?>
  
	<div class="col-md-2 " >
		<?= $form->field($model, 'pub_date')->textInput(['disabled' =>true, ])->label('Дата публикации') ?>
		<?= $form->field($model, 'upload_date')->textInput(['disabled' =>true, ])->label('Дата загрузки') ?>
		<div class="alert top2" <? if(!$showImg) echo'hidden'?>>
			Вы обновили данные
		</div>
	</div>
	
	<div class="col-md-10 text-justify" >

		<?= $form->field($model, 'title')->textInput(['maxlength' => true])->hint(EDITABLE)->label('Название статьи') ?>
		<?= $form->field($model, 'link')->textInput(['maxlength' => true, 'disabled' =>true])->label('Ссылка на оригинал статьи')  ?>
		<?= $form->field($model, 'description')->textInput(['maxlength' => true, 'disabled' =>false])->hint(EDITABLE)->label('Описание') ?>
		<?= $form->field($model, 'url_image')->textInput(['maxlength' => true, 'disabled' =>true])->label('Ссылка на картинку') ?>
		<?= $form->field($model, 'url_guid')->textInput(['maxlength' => true, 'disabled' =>true])->label('Ссылка на статью') ?>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	</div>
	<?php ActiveForm::end(); ?>	
</div>
