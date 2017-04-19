<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $class_id
 * @property integer $id
 * @property string $begin_date
 * @property string $begin_time
 * @property string $length
 *
 * @property Event $class
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id'], 'integer'],
            [['begin_date', 'begin_time'], 'required'],
            [['begin_date', 'begin_time'], 'safe'],
            [['length'], 'string'],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['class_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_id' => 'Class ID',
            'id' => 'ID',
            'begin_date' => 'Begin Date',
            'begin_time' => 'Begin Time',
            'length' => 'Length',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Event::className(), ['id' => 'class_id']);
    }
}
