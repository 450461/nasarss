<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

use app\models\Comment;

/**
 * SearchController implements the CRUD actions for Search model.
 */
class TestController extends Controller
{
	private $controllerName;
    private $actionName;
   
	public function beforeAction($action)
    {
        /*if (!parent::beforeAction($action)) {
            return false;
        }*/
        $this->controllerName = Yii::$app->controller->id;
        $this->actionName     = Yii::$app->controller->action->id;
        return true; 
    }	
	
    public function actionIndex()
    {	
		
		$tst = Comment::find()->where(['ext_id' =>14])->all();
		echo'<pre>';print_r( $tst ); 
		echo count($tst);
		

        return $this->render('index', [
			'model' => $model,
            /*'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,*/
        ]);
		
    }
	
	
}