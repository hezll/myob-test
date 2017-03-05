<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_invoice".
 *
 * @property integer $invoice_number
 * @property integer $invoice_date
 * @property string $charge_to
 * @property string $deliver_to
 * @property integer $invoice_total
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_number', 'invoice_date', 'charge_to', 'deliver_to', 'invoice_total'], 'required'],
            [['invoice_number', 'invoice_date', 'invoice_total'], 'integer'],
            [['charge_to', 'deliver_to'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invoice_number' => 'Invoice Number',
            'invoice_date' => 'Invoice Date',
            'charge_to' => 'Charge To',
            'deliver_to' => 'Deliver To',
            'invoice_total' => 'Invoice Total',
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_code' => 'product_code'])
            ->viaTable('t_invoice_product', ['invoice_number' => 'invoice_number']);
    }
}
