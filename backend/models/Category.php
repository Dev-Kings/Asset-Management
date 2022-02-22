<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property string $category_name
 *
 * @property Assets[] $assets
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'category_name'], 'required'],
            [['category_id'], 'integer'],
            [['category_name'], 'string', 'max' => 50],
            [['category_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
        ];
    }

    /**
     * Gets query for [[Assets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Assets::className(), ['asset_category' => 'category_id']);
    }
}
