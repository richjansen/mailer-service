<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(StatussesSeeder::class);
        $this->call(MailServicesSeeder::class);
        $this->call(RecipientsSeeder::class);
        $this->call(MailsSeeder::class);
        $this->call(MailLogsSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
