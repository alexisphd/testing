<?php

namespace app\controllers;

use app\models\Checkout;
use app\models\Protokol;
use app\models\ProtokolSearch;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProtokolController implements the CRUD actions for Protokol model.
 */
class ProtokolController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'view', 'update', 'delete'],
                'rules' => [

                    [
                        'allow' => true,
                        'actions' => ['index','create', 'update', 'delete', 'view'],
                        'roles' => ['@'],
                        'matchCallback'=>function($rule, $action){
                            return \Yii::$app->user->identity->isAdmin();
                        }

                    ],

                ],
            ],
        ];
        /*return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );*/
    }

    /**
     * Lists all Protokol models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProtokolSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Protokol model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Protokol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Protokol();
        $person = User::find()->select('surname')->indexBy('id')->column();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()))  {
                $raw=$this->request->post();
                $rawId=(int)$raw['Protokol']['idUser'];
              //  $rawId=ArrayHelper::filter($rawId, ['idUser']);
                $result = Checkout::find()->select('result')->where(['idUser'=>$rawId])->scalar();
                $model->userResult=$result;
                $model->save();
                return $this->redirect(['protokol/index']); //, 'raw'=>$rawId]); - чтобы в статусе посмотреть
                //return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'person'=>$person,
        ]);
    }

    /**
     * Updates an existing Protokol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'person' => $person,
        ]);
    }

    /**
     * Deletes an existing Protokol model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Protokol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Protokol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Protokol::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // выкачка пдф
    public function actionPdf($id) {
        $model = $this->findModel($id);

        // This will need to be the path relative to the root of your app.
        $filePath = '/web/library';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->id);


        return Yii::$app->response->sendFile('protokol/view', $model->id, ['inline' => true, 'mimetype'=>'application/pdf']);
    }
}
