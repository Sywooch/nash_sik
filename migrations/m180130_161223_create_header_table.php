<?php

use yii\db\Migration;

/**
 * Handles the creation of table `header`.
 */
class m180130_161223_create_header_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('header', [
            'id' => $this->primaryKey(),
            'header' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('header');
    }
}
