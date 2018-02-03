<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m171112_135237_create_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'description' => $this->string(),
            'title' => $this->string(),
        ]);
    }



    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('task');
    }
}
