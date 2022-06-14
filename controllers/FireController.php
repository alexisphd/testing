<?php

namespace app\controllers;

use app\models\Fire;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FireController implements the CRUD actions for Fire model.
 */
class FireController extends Controller
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
       /* return array_merge(
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
     * Lists all Fire models.
     *
     * @return string
     */
    public function actionIndex($risk=0)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Fire::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'risk'=>$risk,
        ]);
    }

    /**
     * Displays a single Fire model.
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
     * Creates a new Fire model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Fire();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fire model.
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
        ]);
    }

    /**
     * Deletes an existing Fire model.
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
     * Finds the Fire model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Fire the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fire::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCalculate()
    {
        $model = new Fire();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $raw = $this->request->post();
                $class = $raw['Fire']['class'];
                $chastotaFire = $raw['Fire']['chastotaFire'];
                $escapedPeople = $raw['Fire']['escapedPeople'];
                $unescapedPeople = $raw['Fire']['unescapedPeople'];
                $smogDefence = $raw['Fire']['smogDefence'];
                $fireDefence = $raw['Fire']['fireDefence'];
                $alarmSystem = $raw['Fire']['alarmSystem'];
                $fireStationNear = $raw['Fire']['fireStationNear'];
                $fireThings = $raw['Fire']['fireThings'];
                $fireFreeEscapes = $raw['Fire']['fireFreeEscapes'];
                $timeOnwork = $raw['Fire']['timeOnwork'];
                $escapeTime = $raw['Fire']['escapeTime'];
                $escapeBlocking = $raw['Fire']['escapeBlocking'];
                $startEscape = $raw['Fire']['startEscape'];
                $timeZator = $raw['Fire']['timeZator'];
                if ($escapeTime < (0.8 * $escapeBlocking) && $escapeTime < ($escapeTime + $startEscape) && $timeZator < 6)
                    $risk = $chastotaFire * (1 - $fireDefence) * ($timeOnwork / 24) * (1 - (1 - $smogDefence * $alarmSystem) * (1 - (0.8 * $escapeBlocking - $escapeTime) / $startEscape));
                elseif ((0.8 * $escapeBlocking) >= ($escapeTime + $startEscape) && $timeZator <= 6)
                    $risk = $chastotaFire * (1 - $fireDefence) * ($timeOnwork / 24) * (1 - (1 - $smogDefence * $alarmSystem) * (0.001));
                else
                    $risk = $chastotaFire * (1 - $fireDefence) * ($timeOnwork / 24) * (1 - (1 - $smogDefence * $alarmSystem));

                return $this->redirect(['fire/index', 'risk' => $risk]);


            }
        }
        return 'Ошибка в данных';
    }
}
