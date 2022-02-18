<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property int $asset_id
 * @property string $asset_name
 * @property string $asset_description
 * @property int $user_id
 *
 * @property User $asset
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
            [['asset_name', 'asset_description', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['asset_name'], 'string', 'max' => 32],
            [['asset_description'], 'string', 'max' => 100],
            [['user_id'], 'unique'],
            [['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['asset_id' => 'id']],
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
            'asset_description' => 'Asset Description',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Asset]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsset()
    {
        return $this->hasOne(User::className(), ['id' => 'asset_id']);
    }
}
