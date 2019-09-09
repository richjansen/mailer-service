<?php

use Illuminate\Database\Seeder;

class MailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mails')->truncate();

        DB::table('mails')->insert([
            'recipient_id' => 1,
            'subject' => 'Seeded mail',
            'body' => "<p>Seeded mail body</p>",
            'created_at' => now()->subMinutes(20),
        ]);
    }
}
