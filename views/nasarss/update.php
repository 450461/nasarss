<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nasarss */

$this->title = 'Изменить: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Nasarsses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class='container '>

	<div class=' alert alert-info text-center upper spacing top2'>
		<?=Html::encode($this->title)?>
	</div>
	<?= $this->render('_form', [
		'model' => $model, 'showImg' =>$showImg,
		])
	?>

</div>