<?php

use Illuminate\Database\Seeder;

class MailServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_services')->truncate();

        DB::table('mail_services')->insert([
            'name' => 'Mailjet',
            'name' => 'SendGrid',
        ]);
    }
}

