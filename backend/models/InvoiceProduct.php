<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_invoice_product".
 *
 * @property integer $invoice_number
 * @property integer $product_code
 * @property integer $status
 */
class InvoiceProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_invoice_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_number', 'product_code'], 'required'],
            [['invoice_number', 'product_code', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invoice_number' => 'Invoice Number',
            'product_code' => 'Product Code',
            'status' => 'Status',
        ];
    }
}
