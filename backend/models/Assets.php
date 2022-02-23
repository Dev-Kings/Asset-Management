<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property int $asset_id
 * @property string $asset_name
 * @property int $asset_category
 * @property int $asset_amount
 * @property string $date_bought
 * @property string $created_at
 *
 * @property Category $assetCategory
 * @property AssignAsset $assignAsset
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
            [['asset_name', 'asset_category', 'asset_amount', 'date_bought', 'created_at'], 'required'],
            [['asset_category', 'asset_amount'], 'integer'],
            [['date_bought', 'created_at'], 'safe'],
            [['asset_name'], 'string', 'max' => 50],
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
            'asset_amount' => 'Asset Amount',
            'date_bought' => 'Date Bought',
            'created_at' => 'Created At',
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

    /**
     * Gets query for [[AssignAsset]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignAsset()
    {
        return $this->hasOne(AssignAsset::className(), ['asset_id' => 'asset_id']);
    }
}
