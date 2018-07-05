<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //desabilitando check de foreign key para no dar error
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
