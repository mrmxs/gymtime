<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $gym_id
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $publication
 *
 * @property Gym $gym
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gym_id'], 'integer'],
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['publication'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['gym_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gym::className(), 'targetAttribute' => ['gym_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gym_id' => 'Gym ID',
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'publication' => 'Publication',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGym()
    {
        return $this->hasOne(Gym::className(), ['id' => 'gym_id']);
    }
}
