<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Dropdownlist;

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;

$time = 'Thu, 02 Jun 2016 11:29 EDT';
echo date("d-m-Y H:i", strtotime($time)).'<br>';
echo date("d-m-Y H:i")


?>
