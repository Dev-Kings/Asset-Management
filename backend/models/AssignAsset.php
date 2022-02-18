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
            [['asset_id', 'user_id'], 'required'],
            [['asset_id', 'user_id'], 'integer'],
            [['asset_id'], 'unique'],
            [['user_id'], 'unique'],
            [['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assets::className(), 'targetAttribute' => ['asset_id' => 'asset_id']],
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
