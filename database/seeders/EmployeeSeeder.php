<?php

namespace Database\Seeders;

use App\EmployeeTypeEnum;
use App\GenderEnum;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\EmployeeWelcomeEmail;
use Illuminate\Support\Facades\Mail;

class EmployeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $department = Department::create([
            'name' => 'Human Resources',
            'office_location' => 'Head Office',
        ]);

        $employeesData = [
            [
                'email' => 'ashis@gmail.com',
                'name' => 'Ashis Khadka',
                'first_name' => 'Ashis',
                'middle_name' => null,
                'last_name' => 'Khadka',
                'phone_number' => '9845632107',
                'dob' => '1990-01-15',
                'gender' => GenderEnum::Male,
                'address' => 'BKT',
                'emergency_contact_name' => 'Ashis Khadka',
                'emergency_contact_number' => '9876543210',
                'joining_date' => '2023-06-01',
                'job_title' => 'Software Engineer',
                'employee_type' => EmployeeTypeEnum::FullTime,
            ],
            [
                'email' => 'jane.smith@company.com',
                'name' => 'Jane Smith',
                'first_name' => 'Jane',
                'middle_name' => 'Ann',
                'last_name' => 'Smith',
                'phone_number' => '2345678901',
                'dob' => '1988-03-22',
                'gender' => GenderEnum::Female,
                'address' => '456 Elm St, City',
                'emergency_contact_name' => 'John Smith',
                'emergency_contact_number' => '1234567891',
                'joining_date' => '2022-09-15',
                'job_title' => 'Project Manager',
                'employee_type' => EmployeeTypeEnum::FullTime,
            ],
        ];

        // Create users and employees with hashed passwords
        foreach ($employeesData as $data) {
            $plainPassword = Str::password(12, true, true, true, false); // Generate a random plain password

            // Create user with hashed password
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($plainPassword),
                'email_verified_at' => now(),
            ]);
            echo "User created:\n";
            echo "Email: {$user->email}\n";
            echo "Password: {$plainPassword}\n\n";

            // Send welcome email
            try {
                Mail::to($user->email)->send(new EmployeeWelcomeEmail($user->email, $plainPassword));
                echo "Welcome email sent to {$user->email}\n";
            } catch (\Exception $e) {
                echo "Failed to send email to {$user->email}: {$e->getMessage()}\n";
            }

            Employee::create([
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'dob' => $data['dob'],
                'gender' => $data['gender'],
                'address' => $data['address'],
                'emergency_contact_name' => $data['emergency_contact_name'],
                'emergency_contact_number' => $data['emergency_contact_number'],
                'joining_date' => $data['joining_date'],
                'job_title' => $data['job_title'],
                'employee_type' => $data['employee_type'],
                'department_id' => $department->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
