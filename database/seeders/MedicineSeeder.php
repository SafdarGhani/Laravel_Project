<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $medicine = new Medicine();
      $medicine->name = 'Paracetamol';
      $medicine->generic_name = 'Aceteminophen';
      $medicine->manufacturer = 'ABC Pharmaceuticals';
      $medicine->batch_number = '123456';
      $medicine->expiry_date = '2025-12-31';
      $medicine->price = 10.50;
      $medicine->stock_quantity = 100;
      $medicine->unit = 'tablet';
      $medicine->description = 'Used for pain relief and fever reduction.';
      $medicine->prescription_required = 'no';
      $medicine->category = 'painkiller';
      $medicine->status = 'active';
      $medicine->save();
        }
}
