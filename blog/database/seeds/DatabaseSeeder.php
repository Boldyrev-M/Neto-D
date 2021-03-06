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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin',
            'password'=>bcrypt('admin'),
        ]);
        DB::table('status')->insert([
            ['status'=>'awaiting'],
            ['status'=>'hidden'],
            ['status'=>'published']
        ]);

    }
}
