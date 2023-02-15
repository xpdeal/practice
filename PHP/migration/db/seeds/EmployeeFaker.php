<?php


use Phinx\Seed\AbstractSeed;

class EmployeeFaker extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create("pt_BR");
        $table = $this->table('employee');
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'employee_name' => $faker->userName(),
                'company_id' => $faker->numberBetween(1, 5),                
                'employee_name' => $faker->name(),
                'employee_email' => $faker->email(),                
                'employee_birthdate' => '2022-10-05 00:00:00',
                'created_at' => '2022-10-05 00:00:00',
            ];
            $table->insert($data)
                ->save();
        }
    }
}
