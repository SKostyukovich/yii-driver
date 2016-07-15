<?php

use yii\db\Migration;

/**
 * Handles the creation for table `users`.
 */
class m160704_083243_create_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
// auth_assignment
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => Schema::TYPE_STRING . "(64) NOT NULL",
            'user_id' => Schema::TYPE_STRING . "(64) NOT NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NULL",
            'PRIMARY KEY (item_name, user_id)',
        ], $this->tableOptions);

// auth_item
        $this->createTable('{{%auth_item}}', [
            'name' => Schema::TYPE_STRING . "(64) NOT NULL",
            'type' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'description' => Schema::TYPE_TEXT . " NULL",
            'rule_name' => Schema::TYPE_STRING . "(64) NULL",
            'data' => Schema::TYPE_TEXT . " NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NULL",
            'updated_at' => Schema::TYPE_INTEGER . "(11) NULL",
            'PRIMARY KEY (name)',
        ], $this->tableOptions);

// auth_item_child
        $this->createTable('{{%auth_item_child}}', [
            'parent' => Schema::TYPE_STRING . "(64) NOT NULL",
            'child' => Schema::TYPE_STRING . "(64) NOT NULL",
            'PRIMARY KEY (parent, child)',
        ], $this->tableOptions);

// auth_rule
        $this->createTable('{{%auth_rule}}', [
            'name' => Schema::TYPE_STRING . "(64) NOT NULL",
            'data' => Schema::TYPE_TEXT . " NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NULL",
            'updated_at' => Schema::TYPE_INTEGER . "(11) NULL",
            'PRIMARY KEY (name)',
        ], $this->tableOptions);

// cars
        $this->createTable('{{%cars}}', [
            'id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'name' => Schema::TYPE_STRING . "(45) NOT NULL",
            'PRIMARY KEY (id)',
        ], $this->tableOptions);

// drivers
        $this->createTable('{{%drivers}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . "(45) NULL",
            'surname' => Schema::TYPE_STRING . "(45) NULL",
            'phone' => Schema::TYPE_STRING . "(45) NULL",
            'email' => Schema::TYPE_INTEGER . "(20) NULL",
        ], $this->tableOptions);

// orders
        $this->createTable('{{%orders}}', [
            'id' => Schema::TYPE_INTEGER . "(10) UNSIGNED NOT NULL AUTO_INCREMENT",
            'users_id' => Schema::TYPE_INTEGER . "(10) UNSIGNED NOT NULL",
            'cars_id' => Schema::TYPE_INTEGER . "(10) UNSIGNED NOT NULL",
            'date' => Schema::TYPE_DATE . " NOT NULL",
            'time' => Schema::TYPE_TIME . " NOT NULL",
            'route' => Schema::TYPE_TEXT . " NOT NULL",
            'drivers_id' => Schema::TYPE_INTEGER . "(10) UNSIGNED NOT NULL DEFAULT '1'",
            'status' => Schema::TYPE_BOOLEAN . " NOT NULL",
            'comment' => Schema::TYPE_TEXT . " NOT NULL",
            'source' => Schema::TYPE_TEXT . " NOT NULL",
            'PRIMARY KEY (id)',
        ], $this->tableOptions);

// roles
        $this->createTable('{{%roles}}', [
            'id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'description' => Schema::TYPE_STRING . "(45) NULL",
            'PRIMARY KEY (id)',
        ], $this->tableOptions);

// statuslist
        $this->createTable('{{%statuslist}}', [
            'id' => Schema::TYPE_PK,
            'description' => Schema::TYPE_STRING . "(30) NOT NULL",
        ], $this->tableOptions);

// users
        $this->createTable('{{%users}}', [
            'id' => Schema::TYPE_INTEGER . "(45) UNSIGNED NOT NULL AUTO_INCREMENT",
            'username' => Schema::TYPE_STRING . "(45) NOT NULL",
            'password' => Schema::TYPE_STRING . "(60) NOT NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'updated_at' => Schema::TYPE_INTEGER . "(11) UNSIGNED NOT NULL",
            'PRIMARY KEY (id)',
        ], $this->tableOptions);

// users_description
        $this->createTable('{{%users_description}}', [
            'users_id' => Schema::TYPE_INTEGER . "(45) UNSIGNED NOT NULL",
            'name' => Schema::TYPE_STRING . "(45) NOT NULL",
            'surname' => Schema::TYPE_STRING . "(45) NOT NULL",
            'phone' => Schema::TYPE_STRING . "(45) NULL",
            'email' => Schema::TYPE_STRING . "(45) NOT NULL",
            'department' => Schema::TYPE_STRING . "(45) NULL",
            'PRIMARY KEY (users_id)',
        ], $this->tableOptions);

// fk: auth_assignment
        $this->addForeignKey('fk_auth_assignment_item_name', '{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name');

// fk: auth_item
        $this->addForeignKey('fk_auth_item_rule_name', '{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name');

// fk: auth_item_child
        $this->addForeignKey('fk_auth_item_child_parent', '{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name');
        $this->addForeignKey('fk_auth_item_child_child', '{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name');

// fk: users_description
        $this->addForeignKey('fk_users_description_users_id', '{{%users_description}}', 'users_id', '{{%users}}', 'id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
