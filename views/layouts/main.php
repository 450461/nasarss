<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
	
	<meta name="keywords" content="">
    <meta name="description" content="">
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>

	<?php $this->beginBody() ?>

	<div class='row alert alert-info text-center upper top'>
		<h4>
			<div class="col-md-6 topFont">
				<?=Html::a('Главная', Url::to('/nasarss', true))?>		
			</div>
			<div class="col-md-6">			
				<?=Html::a('Синхронизировать', Url::to('', true), ['onclick'=>"sync()"])?><!-- запрос обновления -->
			</div>
		</h4>
	</div>
	<br>

	<?= $content?>

	<footer class="footer"> 
	</footer>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
