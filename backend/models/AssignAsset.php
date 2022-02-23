<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assign_asset".
 *
 * @property int $asset_id
 * @property int $user_id
 *
 * @property Assets $asset
 * @property Category $category
 * @property User $user
 */
class AssignAsset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_asset';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asset_id', 'user_id', 'asset_category'], 'required'],
            [['asset_id', 'user_id', 'asset_category'], 'integer'],
            [['asset_id'], 'unique'],
            [['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assets::className(), 'targetAttribute' => ['asset_id' => 'asset_id']],
            //[['asset_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'asset_id' => 'Asset Name',
            //'category_id' => 'Category Name',
            'asset_category' => 'Category',
            'user_id' => 'User Name',
        ];
    }

    /**
     * Gets query for [[Asset]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsset()
    {
        return $this->hasOne(Assets::className(), ['asset_id' => 'asset_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    /*
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_name']);
    }
    */
    

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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
