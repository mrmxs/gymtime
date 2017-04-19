<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property integer $gym_id
 * @property string $type
 * @property string $name
 * @property string $description
 * @property string $date
 * @property boolean $isactive
 *
 * @property Gym $gym
 * @property Schedule[] $schedules
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gym_id'], 'integer'],
            [['type'], 'string'],
            [['name', 'description', 'date'], 'required'],
            [['isactive'], 'boolean'],
            [['name'], 'string', 'max' => 300],
            [['description'], 'string', 'max' => 2000],
            [['date'], 'string', 'max' => 150],
            [['gym_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gym::className(), 'targetAttribute' => ['gym_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gym_id' => 'Gym ID',
            'type' => 'Type',
            'name' => 'Name',
            'description' => 'Description',
            'date' => 'Date',
            'isactive' => 'Isactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGym()
    {
        return $this->hasOne(Gym::className(), ['id' => 'gym_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['class_id' => 'id']);
    }
}
