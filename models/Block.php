<?php

namespace yeesoft\block\models;

use Yii;
use yeesoft\models\User;
use yeesoft\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yeesoft\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;

/**
 * This is the model class for table "{{%block}}".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $content
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Block extends ActiveRecord
{

    use MultilingualLabelsTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%block}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languageForeignKey' => 'block_id',
                'attributes' => [
                    'title', 'content',
                ]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['slug', 'title'], 'string', 'max' => 127],
            [['slug', 'title'], 'required'],
            [['slug'], 'unique'],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'slug' => Yii::t('yee', 'Slug'),
            'title' => Yii::t('yee', 'Title'),
            'content' => Yii::t('yee', 'Content'),
            'created_by' => Yii::t('yee', 'Author'),
            'updated_by' => Yii::t('yee', 'Updated By'),
            'created_at' => Yii::t('yee', 'Created'),
            'updated_at' => Yii::t('yee', 'Updated'),
            'updatedByName' => Yii::t('yee', 'Updated By'),
            'createdDatetime' => Yii::t('yee', 'Created'),
            'updatedDatetime' => Yii::t('yee', 'Updated'),
        ];
    }

    /**
     * @inheritdoc
     * @return BlockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlockQuery(get_called_class());
    }

    /**
     * Renders a block and replaces block variables with values.
     *
     * @param string $slug the slug of block
     * @param array $variables an array of variables to be replaced in the block template
     * @param string $default default value to be returned if block with slug not found
     * @return string
     */
    public static function render($slug, $variables = [], $default = null)
    {
        $block = self::findOne(['slug' => $slug]);

        if ($block) {
            $content = $block->content;

            if (is_array($variables) && !empty(is_array($variables))) {
                $keys = array_map(function ($var) {
                    return '{{' . $var . '}}';
                }, array_keys($variables));

                $content = str_replace($keys, $variables, $content);
            }

            return $content;
        }

        return $default;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public function getUpdatedByName()
    {
        return $this->updatedBy->username;
    }

    public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedDatetime()
    {
        return $this->createdDate . ' ' . $this->createdTime;
    }

    public function getUpdatedDatetime()
    {
        return $this->updatedDate . ' ' . $this->updatedTime;
    }

}
