<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('transactions')->truncate();
        DB::table('password_reset_tokens')->truncate();
        DB::table('sessions')->truncate();
        DB::table('books')->truncate();
        DB::table('authors')->truncate();
        DB::table('genres')->truncate();
        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            GenresSeeder::class,
            AuthorsSeeder::class,
            UserSeeder::class,
            BooksSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
