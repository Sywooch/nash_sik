<?php

namespace app\models\Products;

use app\models\ImageManager;
use Yii;
use yii\helpers\ArrayHelper;



Yii::setAlias('@images', dirname(dirname(dirname(__DIR__))) . '/web/img/');
/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $category
 * @property string $img
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Категория'
        ];
    }
    public function getImages()
    {
        return $this->hasMany(ImageManager::className(), ['item_id' => 'id'])->andWhere(['class'=>self::tableName()])->orderBy('sort');
    }
    public function getImagesLinks()
    {
        return ArrayHelper::getColumn($this->images,'imageUrl');
    }
    public function getImagesLinksData()
    {
        return ArrayHelper::toArray($this->images,[
                ImageManager::className() => [
                    'caption'=>'name',
                    'key'=>'id',
                ]]
        );
    }

    public function beforeDelete()
    {
        if ($this->getImages()){
            foreach ($this->images as $one){
                unlink(Yii::getAlias('@images').'/products/'. $one->name);
            }
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public static function getIds()
    {
        return  self::find()->select('id')->orderBy('id DESC')->one();
    }
}