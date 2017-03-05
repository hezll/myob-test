<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_dbf".
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_dbf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'company', 'description', 'size', 'created_at', 'updated_at'], 'required'],
            [['size', 'created_at', 'updated_at', 'status'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['company', 'description'], 'string', 'max' => 255],
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
}
