<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <ul class="nav nav-tabs justify-content-center" id="formTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal"
                            type="button" role="tab">Personal</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="professional-tab" data-bs-toggle="tab"
                            data-bs-target="#professional" type="button" role="tab">Professional</button>
                    </li>
                </ul>
            </div>
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content p-4" id="formTabsContent">

                    <!-- Personal Tab -->
                    <div class="tab-pane fade show active" id="personal" role="tabpanel">
                        <h4 class="text-center mb-4">Personal Details</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-form-label for="first_name">First Name <span
                                        class="text-danger">*</span></x-form-label>
                                <x-form-input id="first_name" name="first_name" value="{{ old('first_name') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="middle_name">Middle Name</x-form-label>
                                <x-form-input id="middle_name" name="middle_name" value="{{ old('middle_name') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="last_name">Last Name <span
                                        class="text-danger">*</span></x-form-label>
                                <x-form-input id="last_name" name="last_name" value="{{ old('last_name') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="dob">Date of Birth <span
                                        class="text-danger">*</span></x-form-label>
                                <x-form-input id="dob" name="dob" type="date"
                                    value="{{ old('dob') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="gender">Gender <span class="text-danger">*</span></x-form-label>
                                <select class="form-select" id="gender" name="gender">
                                    <option selected disabled>Select Gender</option>
                                    <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Female</option>
                                    <option value="3" {{ old('gender') == 3 ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="email">Email <span class="text-danger">*</span></x-form-label>
                                <x-form-input id="email" name="email" type="email"
                                    value="{{ old('email') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="phone_number">Phone <span class="text-danger">*</span></x-form-label>
                                <x-form-input id="phone_number" name="phone_number"
                                    value="{{ old('phone_number') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="address">Address <span class="text-danger">*</span></x-form-label>
                                <x-form-input id="address" name="address" value="{{ old('address') }}" />
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary" type="button" onclick="switchTab(1)">Next</button>
                        </div>
                    </div>

                    <!-- Professional Tab -->
                    <div class="tab-pane fade" id="professional" role="tabpanel">
                        <h4 class="text-center mb-4">Professional Details</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-form-label for="job_title">Job Title</x-form-label>
                                <x-form-input id="job_title" name="job_title" value="{{ old('job_title') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="department_id">Department</x-form-label>
                                <select class="form-select" id="department_id" name="department_id">
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="employee_id">Employee ID</x-form-label>
                                <x-form-input id="employee_id" name="employee_id"
                                    value="{{ old('employee_id') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="employee_type">Employee Type <span
                                        class="text-danger">*</span></x-form-label>
                                <select class="form-select" name="employee_type" id="employee_type">
                                    <option selected disabled>Select employee type</option>
                                    <option value="1" {{ old('employee_type') == 1 ? 'selected' : '' }}>Full Time
                                    </option>
                                    <option value="2" {{ old('employee_type') == 2 ? 'selected' : '' }}>Part Time
                                    </option>
                                    <option value="3" {{ old('employee_type') == 3 ? 'selected' : '' }}>Remote
                                    </option>
                                    <option value="4" {{ old('employee_type') == 4 ? 'selected' : '' }}>Intern
                                    </option>
                                    <option value="5" {{ old('employee_type') == 5 ? 'selected' : '' }}>
                                        Contractual</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="joining_date">Joining Date <span
                                        class="text-danger">*</span></x-form-label>
                                <x-form-input id="joining_date" name="joining_date" type="date"
                                    value="{{ old('joining_date') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="offer_letter">Offer Letter <span
                                        class="text-danger">*</span></x-form-label>
                                <input type="file" id="offerLetterDropify" class="border" name="offer_letter" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <x-form-label for="role">Role</x-form-label>
                                <select class="form-select" id="role" name="role">
                                    <option value="" disabled selected>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="switchTab(0)">Back</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(index) {
            const tabTriggerEls = document.querySelectorAll('#formTabs button');
            if (tabTriggerEls[index]) {
                const tab = new bootstrap.Tab(tabTriggerEls[index]);
                tab.show();
            }
        }
    </script>
</x-layout>
