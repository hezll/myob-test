<?php
/**
 * This is the Dbf management controller
 * User: Henry Ho
 * Date: 26/02/2017
 * Time: 10:21 PM
 */

namespace backend\controllers;

use yii\base\Controller;
use yii\data\ArrayDataProvider;
use backend\models\PayslipForm;
use Yii;

class PayslipController extends Controller
{
    public function actionCreate()
    {
        $model = new PayslipForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('create',['model'=>$model,'create'=>1]);
        }


        return $this->render('create',['model'=>$model]);
    }

    public function actionTest(){

    }
}