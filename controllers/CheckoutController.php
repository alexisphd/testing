<?php

namespace app\controllers;

use app\models\Category;
use app\models\Checkout;
use app\models\CheckoutSearch;
use app\models\Question;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckoutController implements the CRUD actions for Checkout model.
 */
class CheckoutController extends Controller
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
                        'actions' => ['create', 'view'],
                        'roles' => ['@'],


                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete', 'index'],
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
     * Lists all Checkout models.
     *
     * @return string
     */
    public function actionIndex($result=0)
    {
        $searchModel = new CheckoutSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'result' => $result,
        ]);
    }

    /**
     * Displays a single Checkout model.
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
     * Creates a new Checkout model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
       $model = new Checkout();
        $category=Category::find()->select('name')->indexBy('id')->column();
        $result = 0;
        $questions=\app\models\Question::find()->all();
        $counts=count($questions);
        if ($model->load(\Yii::$app->request->post())  ) {
            $answers = $this->request->post();
            //    $first = Question::find()->select(['correct'])->where(['id'=>1])->scalar();
            foreach ($answers as $answer=>$value) {
                $first [$answer]= Question::find()->select(['correct'])->where(['id'=>$answer])->scalar(); //выборка из модели
                $second [$answer]=$value;
                if ($first[$answer]==$second[$answer])
                    $result++;}
            //     $model->idUser=\Yii::$app->user->identity->id;

            $model->result=$result;
            $model->save(); //false если без валидации

            return $this->redirect(['cabinet/index', 'result'=>$result]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'category'=>$category,
            'questions'=>$questions,
            'counts'=>$counts,
        ]);
    }



    /**
     * Updates an existing Checkout model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
  /*  public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'counts' => $counts,
            'questions' => $questions,
            'category' => $category,
        ]);
    }*/

    /**
     * Deletes an existing Checkout model.
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
     * Finds the Checkout model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Checkout the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Checkout::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
