<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            ['name' => 'Basic', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Premium', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Ultimate', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('services')->insert([
            ['name' => 'DSL', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Fiber', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => '3g', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('applicants')->insert([
            [
                'phone' => '+961 70 863 993',
                'name' => 'Ahmad Moussawi',
                'address' => 'Beirut',
                'type' => 'residential',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'phone' => '+961 70 123456',
                'name' => 'Jessica',
                'address' => 'Beirut',
                'type' => 'residential',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'phone' => '+961 70 123458',
                'name' => 'Nadine',
                'address' => 'Beirut',
                'type' => 'corporate',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
