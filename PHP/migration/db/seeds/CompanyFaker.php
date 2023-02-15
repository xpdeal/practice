<?php


use Phinx\Seed\AbstractSeed;

class CompanyFaker extends AbstractSeed
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
        $table = $this->table('company');
        $data = [];
        for($i=0; $i<5; $i++){
            $data[]=[
                "company_name"=>$faker->company(),
                "company_address"=>$faker->address()         
            ];
        }
        $table->insert($data)
              ->save();  
    }
}
