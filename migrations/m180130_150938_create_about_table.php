<?php

use yii\db\Migration;

/**
 * Handles the creation of table `about`.
 */
class m180130_150938_create_about_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('about', [
            'id' => $this->primaryKey(),
            'link' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('about');
    }
}
