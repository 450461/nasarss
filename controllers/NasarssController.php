<?php

namespace app\controllers;

use Yii;
use app\models\Comment;
use app\models\Nasarss;
use app\models\NasarssSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


class NasarssController extends Controller
{
	private $controllerName;
    private $actionName;
	const RSS ='https://www.nasa.gov/rss/dyn/lg_image_of_the_day.rss';

	public function beforeAction($action)
    {
        $this->controllerName = Yii::$app->controller->id;
        $this->actionName     = Yii::$app->controller->action->id;
        return true;
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
//	выводим список всех статей в таблице
    public function actionIndex()
    {
        $query = Nasarss::find()->orderBy(['pub_date' => SORT_DESC]);
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => false,
		]);

        return $this->render($this->actionName, [
			'provider' => $provider,
			'count' => $provider->getCount(),
        ]);
    }
	
//просмотр конкретной статьи
    public function actionView($id)
    {
       $query = Nasarss::find()->where(['id' => Yii::$app->request->get('id')])->one();

		return $this->render($this->actionName, [
			'model' => $model,
			'query' => $query,
			'cmtArr' => Comment::find()->where(['ext_id' => Yii::$app->request->get('id')])->all(),
			]);
    }
	
//обновляю данные в выбранной статье
	public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		/*$model->load(Yii::$app->request->post());
		$model->save();
		return $this->render('update', [
                'model' => $model,
				'ok' => 'Обновлено',
        ]);
		*/
       
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('update', [
                'model' => $model,
				'showImg' => true,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'showImg' => false,
            ]);
        }
		
    }
	
// метод для удаления строки из базы
    public function actionDelete($id)
    {
        $model = Nasarss::findOne(['id' => $id]);
		$model->delete();

		$query = Nasarss::find()->orderBy(['pub_date' => SORT_DESC]);
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => false,
		]);

        return $this->renderPartial($this->actionName, [
			'provider'=>$provider,
			'count' => $provider->getCount(),
        ]);
    }
	
//синхронизация с серевром nasa на предмет новых статей
	public function actionSynchronize()
    {
		$xml = Yii::$app->help->parseRSS(self::RSS);	//компонент для подготовки ответа от сервера
		$connection = Yii::$app->db;
		$i = 0;	//количество новых строк
		foreach($xml->xpath('//item') as $item){
			/*проверяю, если то что пришло от сервера не совпадает  по title и времени публикации, пишу в базу, 
				можно было ещё сделать и сверку по ссылке на оригинал, но в рамках тест задания не стал
			*/
			if ((!nasarss::find()->where(['title' => $item->title])->one()) &&
					(!nasarss::find()->where(['pub_date' => date("Y-m-d H:i", strtotime($item->pubDate))])->one())){
				$connection->createCommand()->insert(
							'nasarss',[
										'title' => $item->title ,
										'link' => $item->link ,
										'description' => $item->description ,
										'url_image' => $item->enclosure['url'] ,
										'url_guid' => $item->guid ,
										'pub_date' => date("Y-m-d H:i", strtotime($item->pubDate)),
										'upload_date' => date("Y-m-d H:m"),
										]
							)->execute();
				$i++;			
			}
		}

		$query = Nasarss::find()->orderBy(['pub_date' => SORT_DESC]);
		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => false,
		]);

        return $this->renderPartial($this->actionName, [
			'provider'=>$provider,
			'count' => $provider->getCount(),
        ]);
	}

    protected function findModel($id)
    {
        if (($model = Nasarss::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	

    public function actionCreate()
    {
        $model = new Nasarss();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}