<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "image_manager".
 *
 * @property integer $id
 * @property string $name
 * @property string $class
 * @property integer $item_id
 * @property string $alt
 * @property integer $sort
 */
class ImageManager extends \yii\db\ActiveRecord
{
    public $attachment;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image_manager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'sort'], 'integer'],
            [['sort'], 'default', 'value'=>function($model){
                $count = ImageManager::find()->andWhere([
                   'class'=>$model->class])->count();
                return ($count > 0)?$count++ :0;
            }],
            [['name', 'class', 'alt'], 'string', 'max' => 255],
            [['attachment'], 'image'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'class' => 'Class',
            'item_id' => 'Item ID',
            'alt' => 'Alt',
            'sort' => 'Sort',
        ];
    }
    public function getImageUrl()
    {
        if ($this->name){
            $path = '/img/'.strtolower($this->class).'/'. strtolower($this->name);;
        }else {
            $path = Url::home(true).'web/no-image.png';
        }
        return $path;
    }
    public function beforeDelete()
    {
        if (parent::beforeDelete()){
            $dir = Yii::getAlias('@images').'/products/';
            if(file_exists($dir.$this->name)){
                unlink($dir.$this->name);
            }
            if(file_exists($dir.'50x50/'.$this->name)){
                unlink($dir.'50x50/'.$this->name);
            }
            ImageManager::updateAllCounters(['sort' => -1], [
                'and', ['class'=>'products', 'item_id'=>$this->item_id],['>','sort',$this->sort]
            ]);

            return true;
        }else {
            return false;
        }
    }

}
