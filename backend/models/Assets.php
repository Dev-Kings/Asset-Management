<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property int $asset_id
 * @property string $asset_name
 * @property string $asset_description
 * @property string $created_at
 */
class Assets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asset_name', 'asset_description', 'created_at'], 'required'],
            [['created_at'], 'safe'],
            [['asset_name'], 'string', 'max' => 50],
            [['asset_description'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'asset_id' => 'Asset Name',
            'asset_name' => 'Asset Name',
            'asset_description' => 'Asset Description',
            'created_at' => 'Created At',
        ];
    }
}
