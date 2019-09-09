<?php

use Illuminate\Database\Seeder;

class RecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipients')->truncate();

        DB::table('recipients')->insert([
            [
                'name' => 'John Doe',
                'email_address' => env('TEST_EMAIL')
            ],
        ]);
    }
}
