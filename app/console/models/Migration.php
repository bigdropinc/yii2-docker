<?php
/**
 * Created by PhpStorm.
 * User: bigdrop
 * Date: 22.06.17
 * Time: 18:05
 */

namespace console\models;

/**
 * Class Migration
 *
 * @package console\migrations
 */
class Migration extends \yii\db\Migration
{
    /**
     * @param $table string
     * @param $columns array|string
     * @return string
     */
    public static function buildFk($table, $columns)
    {
        return md5($table . serialize($columns));
    }

    /**
     * @inheritdoc
     */
    public function addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete = null, $update = null)
    {
        if ($name === null) {
            $name = self::buildFk($table, $columns);
        }

        parent::addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete, $update);
    }

    /**
     * @inheritdoc
     */
    public function primaryKey($length = null)
    {
        return parent::primaryKey($length)->unsigned();
    }

    /**
     * @inheritdoc
     */
    public function createTable($table, $columns, $options = null)
    {
        if ($this->db->driverName === 'mysql') {
            $options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        parent::createTable($table, $columns, $options);
    }

    /**
     * @param $table string
     * @param $columns array ['comment' => $this->string(128), ...]
     */
    public function addColumns(string $table, array $columns)
    {
        foreach ($columns as $column => $type) {
            $this->addColumn($table, $column, $type);
        }
    }

    /**
     * @param string $table
     * @param array  $columns
     */
    public function dropColumns(string $table, array $columns)
    {
        foreach ($columns as $column) {
            $this->dropColumn($table, $column);
        }
    }
}
