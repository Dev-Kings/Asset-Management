<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property int $asset_id
 * @property string $asset_name
 * @property int $asset_category
 * @property string $asset_description
 * @property string $date_assigned
 * @property string $created_at
 *
 * @property Category $assetCategory
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
            [['asset_name', 'asset_category', 'asset_description', 'date_assigned'], 'required'],
            [['asset_id', 'asset_category'], 'integer'],
            [['date_assigned'], 'safe'],
            [['asset_name'], 'string', 'max' => 50],
            [['asset_description'], 'string', 'max' => 200],
            [['asset_id'], 'unique'],
            [['asset_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['asset_category' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'asset_id' => 'Asset ID',
            'asset_name' => 'Asset Name',
            'asset_category' => 'Asset Category',
            //'category.category_name' => 'Asset Category',
            'asset_description' => 'Asset Description',
            'date_assigned' => 'Date Assigned',
            //'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[AssetCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'asset_category']);
    }
}
