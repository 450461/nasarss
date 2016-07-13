<?php

use yii\helpers\Html;

$this->title = 'Create Nasarss';
$this->params['breadcrumbs'][] = ['label' => 'Nasarsses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="nasarss-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	
</div>
