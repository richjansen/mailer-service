<?php

use Illuminate\Database\Seeder;

class StatussesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_statusses')->truncate();

        DB::table('mail_statusses')->insert([
            ['name' => 'queued'],
            ['name' => 'send'],
            ['name' => 'bounced'],
        ]);
    }
}
