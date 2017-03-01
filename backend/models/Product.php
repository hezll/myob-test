<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_product".
 *
 * @property integer $product_code
 * @property string $cat
 * @property integer $inds
 * @property string $description
 * @property integer $size
 * @property integer $pack_qty
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_code', 'cat', 'inds', 'description', 'size', 'pack_qty'], 'required'],
            [['product_code', 'inds', 'size', 'pack_qty'], 'integer'],
            [['cat'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_code' => 'Product Code',
            'cat' => 'Cat',
            'inds' => 'Inds',
            'description' => 'Description',
            'size' => 'Size',
            'pack_qty' => 'Pack Qty',
        ];
    }
}
