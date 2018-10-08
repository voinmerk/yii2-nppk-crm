<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $model
 * @property string $article
 * @property string $comment
 * @property string $image
 * @property int $category_id
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'model', 'category_id', 'room_id'], 'required'],
            [['category_id', 'room_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title', 'model', 'article', 'comment', 'image'], 'string', 'max' => 255],
            [['article'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'blame' => [
                'class' => \yii\behaviors\BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'title' => 'Название',
            'model' => 'Модель',
            'article' => 'Инвентарный номер',
            'comment' => 'Комментарий',
            'image' => 'Изображение',
            'category_id' => 'Категория',
            'room_id' => 'Кабинет',
            'created_by' => 'Автор',
            'updated_by' => 'Медератор',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',

            'categoryName' => 'Категория',
            'roomName' => 'Кабинет',
            'createdName' => 'Автор',
            'updatedName' => 'Медератор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category->title;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return string
     */
    public function getRoomName()
    {
        return $this->room->title;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return string
     */
    public function getCreatedName()
    {
        return $this->createdBy->username;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return string
     */
    public function getUpdatedName()
    {
        return $this->updatedBy->username;
    }
}
