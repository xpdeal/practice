<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableemployee extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('employee', ['id' => 'employee_id']);
        $table->addColumn('company_id', 'integer')
                ->addColumn('employee_name', 'string', ['limit' => 40])
            ->addColumn('employee_email', 'string', ['limit' => 100])
            ->addColumn('employee_birthdate', 'datetime')
            
            ->addTimestamps()
            ->create();
    }
}
