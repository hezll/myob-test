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
use XBase\Table;

class DbfController extends Controller
{
    public function actionIndex()
    {
        /**
         *  This should be added in a helper and not in a action.
         *  not finished
         */
        $table = new Table('../web/invoice_dbfs/1.DBF');
        $columns = $table->getColumns();
        $res = [];
        while ($record = $table->nextRecord()) {
            foreach ($columns as $column) {
                $res[] =  $record->forceGetString($column->name);
            }
        }
        $data = [];
        foreach($res as $key=>$val){
            // some complicated analysis should be added here
            $data[]['dbf']=$val;
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 20,
            ],
//            'sort' => [
//                'attributes' => ['id', 'name'],
//            ],
        ]);

        return $this->render('index',['dataProvider' =>$dataProvider]);
    }
}