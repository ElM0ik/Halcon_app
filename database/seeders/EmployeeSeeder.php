<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
   public function run(): void
{
    // Default admin
    Employee::create([
        'full_name'     => 'System Administrator',
        'email'         => 'admin@halcon.com',
        'password_hash' => bcrypt('password'),
        'department'    => 'Admin',
        'is_active'     => true,
    ]);

    // One per department
    $departments = ['Sales', 'Purchasing', 'Warehouse', 'Route'];
    foreach ($departments as $dept) {
        Employee::create([
            'full_name'     => "$dept User",
            'email'         => strtolower($dept) . '@halcon.com',
            'password_hash' => bcrypt('password'),
            'department'    => $dept,
            'is_active'     => true,
        ]);
    }
}
}
