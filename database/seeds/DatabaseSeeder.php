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
            [
                'name' => 'Basic',
                'country' => 'LB',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'name' => 'Premium',
                'country' => 'LB',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ultimate',
                'country' => 'UAE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'UAE Basic',
                'country' => 'UAE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'UAE PRO',
                'country' => 'UAE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'UAE SUPER PRO',
                'country' => 'UAE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);

        DB::table('services')->insert([
            ['name' => 'DSL', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Fiber', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => '3g', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('applicants')->insert([
            [
                'phone' => '+961 70 863 993',
                'name' => 'Ahmad',
                'family' => 'Moussawi',
                'address' => 'Beirut',
                'type' => 'residential',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'phone' => '+961 70 123456',
                'name' => 'Jessica',
                'family' => 'Jessica',
                'address' => 'Beirut',
                'type' => 'residential',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'phone' => '+961 70 123458',
                'name' => 'Nadine',
                'family' => 'Nadine',
                'address' => 'Beirut',
                'type' => 'corporate',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

        ]);



        DB::table('applications')->insert([
            [
                'price' => '100',
                'date' => '2017-02-01',
                'applicant_id' => 1,
                'service_id' => 1,
                'plan_id' => 1,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'price' => '150',
                'date' => '2017-02-07',
                'applicant_id' => 1,
                'service_id' => 2,
                'plan_id' => 1,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'price' => '200',
                'date' => '2017-03-02',
                'applicant_id' => 1,
                'service_id' => 2,
                'plan_id' => 1,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'price' => '100',
                'date' => '2017-04-05',
                'applicant_id' => 1,
                'service_id' => 2,
                'plan_id' => 2,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'price' => '90',
                'date' => '2017-05-01',
                'applicant_id' => 1,
                'service_id' => 2,
                'plan_id' => 3,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'price' => '0',
                'date' => '2017-05-01',
                'applicant_id' => 1,
                'service_id' => 2,
                'plan_id' => 3,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'price' => '300',
                'date' => '2017-05-01',
                'applicant_id' => 1,
                'service_id' => 2,
                'plan_id' => 4,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'price' => '20',
                'date' => '2017-05-01',
                'applicant_id' => 1,
                'service_id' => 2,
                'plan_id' => 5,
                'description' => '',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],

        ]);

        DB::table('menu')->insert([
            // [
            //     'name' => 'Pending Feasibility',
            //     'path' => '/pending',
            //     'role' => 'sales',
            // ],
            // [
            //     'name' => 'Ready for Configuration',
            //     'path' => '/ready-for-configuration',
            //     'role' => 'technical',
            // ],
            // [
            //     'name' => 'Ready for Installation',
            //     'path' => '/ready-for-installation',
            //     'role' => 'outdoor',
            // ],
            // [
            //     'name' => 'Complaints',
            //     'path' => '/complaints',
            //     'role' => 'support',
            // ],

            [
                'name' => 'Plans',
                'path' => '/plans',
            ],
            [
                'name' => 'Applications',
                'path' => '/applications',
            ],
            [
                'name' => 'Support',
                'path' => '/support',
            ],
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
