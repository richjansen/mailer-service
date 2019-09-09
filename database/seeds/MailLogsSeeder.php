<?php

use Illuminate\Database\Seeder;

class MailLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_logs')->truncate();

        DB::table('mail_logs')->insert([
            'mail_id' => 1,
            'status_id' => 1,
            'mail_service_id' => 1,
            'created_at' => now()->subMinutes(20),
        ], [
            'mail_id' => 1,
            'status_id' => 2,
            'mail_service_id' => 1,
            'created_at' => now()->subMinutes(20),
        ]);
    }
}
