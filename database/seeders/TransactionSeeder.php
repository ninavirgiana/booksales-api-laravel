<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        Transaction::create([
            'order_number' => 'ORD-0001',
            'customer_id' => 2,
            'book_id' => 1,
            'total_amount' => 250000.00,
        ]);

        Transaction::create([
            'order_number' => 'ORD-0002',
            'customer_id' => 2,
            'book_id' => 2,
            'total_amount' => 250000.00,
        ]);
    }
}