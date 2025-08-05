<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = new Employee();
        $employee->name = 'Sagar Maik';
        $employee->father_name = 'Malik Akhter Ghani Awan';
        $employee->cnic = '12345-6789012-3';
        $employee->email = 'sagar.maik@example1.com';
        $employee->phone = '0300-1234567';
        $employee->address = '123 Main Street, City, Country';
        $employee->date_of_birth = '1990-01-01';
        $employee->date_of_joining = '2025-01-01';
        $employee->position = 'pharmacist';
        $employee->save();
    }
}
