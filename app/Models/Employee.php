<?php

namespace App\Models;

use App\GenderEnum;
use App\Models\Role;
use App\EmployeeTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{

    protected $casts = [
        'gender' => GenderEnum::class,
        'employee_type' => EmployeeTypeEnum::class,
    ];
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_number',
        'dob',
        'gender',
        'address',
        'emergency_contact_name',
        'emergency_contact_number',
        'joining_date',
        'job_title',
        'employee_type',
        'department_id',
        'offer_letter',
        'role_id',
        'user_id',
    ];

    /**
     * Get the user that owns the employee.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the employee that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
