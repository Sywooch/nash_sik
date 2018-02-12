<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image_manager`.
 */
class m180130_150814_create_image_manager_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('image_manager', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'class' => $this->string(),
            'item_id' => $this->integer(),
            'alt' => $this->string(),
            'sort' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('image_manager');
    }
}
