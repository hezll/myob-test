<?php

namespace backend\models;

use League\Flysystem\Exception;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use XBase\Table;
use XBase\Exception\TableException;
use backend\models\Invoice;
use backend\helpers\DbfHelper;
use backend\models\Product;
use backend\models\InvoiceProduct;
/**
 * This is the model class for table "t_dbf".
 * Also adding the upload behavior for uploading files.
 * a dbfHelper for analysis the dbf file;
 *
 * @property integer $id
 * @property string $name
 * @property string $company
 * @property string $description
 * @property integer $size
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Dbf extends \yii\db\ActiveRecord
{

    public $dbffile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_dbf';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'dbffile',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company', 'description', 'published_at'], 'required'],
            [['size', 'created_at', 'updated_at', 'status'], 'integer'],
            [['company', 'description'], 'string', 'max' => 255],
            [['dbffile'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'company' => 'Company',
            'description' => 'Description',
            'size' => 'Size',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * This is a function for analysis dbf file
     * This is the key function for this project.
     * we try to analysis the dbf and then insert it into our db.
     * However, this is a demo and I donot have too much time to do this. thanks for your understanding.
     */

    public function processDbf(){
        try {
            $table = new Table('../../storage/web/source/' . $this->path);
            $columns = $table->getColumns();
            $res = [];
            while ($record = $table->nextRecord()) {
                foreach ($columns as $column) {
                    $res[] = $record->forceGetString($column->name);
                }
            }
            $data = [];
            $invoices = [];
            foreach ($res as $key => $val) {
                // some complicated analysis should be added here
                $data[]['dbf'] = $val;

                $invoce_number = DbfHelper::getInvoiceNumber($val);
                if($invoce_number) {
                    $invoices[$invoce_number][] = $val;
                }else{
                    $invoce_tmp[]['from_to'] = $val;
                }
            }

            /**
             *  This is the process for analysis
             */
            if(is_array($invoices)&&$invoices) {
                $invoice = [];
                foreach($invoices as $invoice_number=>$val) {
                    $invoice['date'] = trim(mb_substr($val[0],154,8));
                    $invoice['charge_to'] = trim(mb_substr($val[0],24,30));
                    $invoice['deliver_to'] = trim(mb_substr($val[0],60,45));
                    $invoice['total'] = '1';//#TODO this may be some error for the total money
                    //TODO insert invocie
                    if (($invoiceModel = Invoice::findOne($invoice_number)) !== null) {

                    } else {
                        $invoiceModel = new Invoice();

                    }
                    $invoiceModel->invoice_date = $invoice['date'];
                    $invoiceModel->charge_to = $invoice['charge_to'];
                    $invoiceModel->deliver_to = $invoice['deliver_to'];
                    $invoiceModel->invoice_total = $invoice['total'];
                    $invoiceModel->invoice_number = $invoice_number;
                    $invoiceModel->save();

                    /**
                     * process invoice products
                     */
                    //filter and list the products
                    unset($val[0]);
                    array_pop($val);
                    $product_arr = [];
                    foreach($val as $v){
                        $product_arr['product_code'] = trim(mb_substr($v,72,7));
                        $product_arr['description'] = trim(mb_substr($v,41,25));
                        $product_arr['size'] = trim(mb_substr($v,60,12));

                        if (($productModel = Product::findOne($product_arr['product_code'])) !== null) {

                        }else {
                            $productModel = new Product();
                        }
                        $productModel->attributes = $product_arr;
                        $productModel->save();
                        //insert relationship betwwen invoice to products
                        $invoiceProductRes = InvoiceProduct::find()->where(['invoice_number'=>$invoice_number,'product_code'=>$product_arr['product_code']]);
                        if(!isset($invoiceProductRes->invoice_number)){
                            $invoiceProductModel = new InvoiceProduct();
                            $invoiceProductModel->invoice_number = $invoice_number;
                            $invoiceProductModel->product_code = $product_arr['product_code'];
                            $invoiceProductModel->save();
                        }


//                        var_dump($productModel->errors);
                    }
             //       var_dump($product_arr);
//                    var_dump($val);exit;

                }
            }
            //TDOO insert product
        }catch (TableException  $e){
            $this->addError('dbffile','is not DBF,pleas check it later');

            return false;
        }

    }
}
