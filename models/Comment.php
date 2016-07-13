<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $user
 * @property string $note
 * @property integer $ext_id
 *
 * @property Nasarss $ext
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'note', 'ext_id'], 'required'],
            [['ext_id'], 'integer'],
            [['user'], 'string', 'max' => 20],
            [['note'], 'string', 'max' => 250],
            [['ext_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nasarss::className(), 'targetAttribute' => ['ext_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'note' => 'Note',
            'ext_id' => 'Ext ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExt()
    {
        return $this->hasOne(Nasarss::className(), ['id' => 'ext_id']);
    }
}
