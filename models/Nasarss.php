<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nasarss".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $description
 * @property string $url_image
 * @property string $url_guid
 * @property string $pub_date
 * @property string $upload_date
 */
class Nasarss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nasarss';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link', 'description', 'url_image', 'url_guid', 'pub_date', 'upload_date'], 'required'],
            [['pub_date', 'upload_date'], 'safe'],
            [['title', 'link'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['url_image', 'url_guid'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'link' => 'Link',
            'description' => 'Description',
            'url_image' => 'Url Image',
            'url_guid' => 'Url Guid',
            'pub_date' => 'Pub Date',
            'upload_date' => 'Upload Date',
        ];
    }
}
