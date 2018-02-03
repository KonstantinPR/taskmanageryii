<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Task".
 *
 * @property integer $id
 * @property string $description
 * @property string $title
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'title' => 'Title',
        ];
    }


}
