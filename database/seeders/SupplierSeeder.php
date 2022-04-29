<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          ['name' => 'Test Supplier 1', 'phone' => '01900000001', 'email' => 'testsupplier1@test.com', 'address' => 'Test Address 1', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Test Supplier 2', 'phone' => '01900000002', 'email' => 'testsupplier2@test.com', 'address' => 'Test Address 2', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Test Supplier 3', 'phone' => '01900000003', 'email' => 'testsupplier3@test.com', 'address' => 'Test Address 3', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('suppliers')->insert($data);
      }
}
