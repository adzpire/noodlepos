<?php

namespace frontend\modules\noodlepos\controllers;

use Yii;
use frontend\modules\noodlepos\models\NoodleOrder;
use frontend\modules\noodlepos\models\NoodleTable;
use frontend\modules\noodlepos\models\NoodleMenu;
use frontend\modules\noodlepos\models\NoodleType;
use frontend\modules\noodlepos\models\NoodleAddon;
use frontend\modules\noodlepos\models\NoodleOrderdetail;
use frontend\modules\noodlepos\models\NoodleOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\Response;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * NoController implements the CRUD actions for NoodleOrder model.
 */
class NoController extends Controller
{
    /**
     * @inheritdoc
     */
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

	 public $admincontroller = [20];

    public function beforeAction(){
        foreach($this->admincontroller as $key){
            array_push(Yii::$app->controller->module->params['adminModule'],$key);
        }

        return true;
		  /* 
        if(ArrayHelper::isIn(Yii::$app->user->id, Yii::$app->controller->module->params['adminModule'])){
            //echo 'you are passed';
        }else{
            throw new ForbiddenHttpException('You have no right. Must be admin module.');
        }
        */
    }
	 
    /**
     * Lists all NoodleOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = 'Noodle Orders'.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        $searchModel = new NoodleOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NoodleOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = 'Detail'.' : '.$model->id.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

	public function actionMycomment($id, $to)
	{
		   $model = $this->findModel($id);
	   if ($model->load(Yii::$app->request->post())) {
			if($model->save()){	
				return $this->redirect(['index']);
			}else{
				exit();
			}
        } 
		
		   return $this->renderAjax('_formchange', [
					'model' => $model,
					'to' => $to,
			]);
	}
    /**
     * Creates a new NoodleOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = 'Create'.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        $model = new NoodleOrder();
		$modeldetail = [new NoodleOrderdetail];
		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => 'UrDataCreated',
				]);
			return $this->redirect(['view', 'id' => $model->id]);	
			}else{
				Yii::$app->getSession()->setFlash('addflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => 'UrDataNotCreated',
				]);
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }

            return $this->render('dynaform', [
                'model' => $model,
                'tablelist' => ArrayHelper::map(NoodleTable::find()->all(), 'id', 'name'),
                'menulist' => ArrayHelper::map(NoodleMenu::find()->all(), 'id', 'name'),
                'noodletypelist' => ArrayHelper::map(NoodleType::find()->all(), 'id', 'name'),
                'addonlist' => ArrayHelper::map(NoodleAddon::find()->all(), 'id', 'name'),
              	'modeldetail' => [new NoodleOrderdetail]
            ]);
        

    }

    /**
     * Updates an existing NoodleOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = 'Update Noodle Order: ' . $model->id.' - '.Yii::t('itinfo/app', Yii::$app->controller->module->params['title']);
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'success',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-ok-circle',
				'message' => 'UrDataUpdated',
				]);
			return $this->redirect(['view', 'id' => $model->id]);	
			}else{
				Yii::$app->getSession()->setFlash('edtflsh', [
				'type' => 'danger',
				'duration' => 4000,
				'icon' => 'glyphicon glyphicon-remove-circle',
				'message' => 'UrDataNotUpdated',
				]);
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } 

            return $this->render('update', [
                'model' => $model,
            ]);
        

    }

    /**
     * Deletes an existing NoodleOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		
		Yii::$app->getSession()->setFlash('edtflsh', [
			'type' => 'success',
			'duration' => 4000,
			'icon' => 'glyphicon glyphicon-ok-circle',
			'message' => 'UrDataDeleted',
		]);
		

        return $this->redirect(['index']);
    }

    /**
     * Finds the NoodleOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NoodleOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NoodleOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
