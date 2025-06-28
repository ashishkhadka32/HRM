<x-layout>
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
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content p-4" id="formTabsContent">

                    <!-- Personal Tab -->
                    <div class="tab-pane fade show active" id="personal" role="tabpanel">
                        <h4 class="text-center mb-4">Personal Details</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-form-label for="firstname">First Name <span
                                        class="text-danger">*</span></x-form-label>
                                <x-form-input id="firstname" name="firstname" value="{{ old('firstname') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="middlename">Middle Name</x-form-label>
                                <x-form-input id="middlename" name="middlename" value="{{ old('middlename') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="lastname">Last Name <span class="text-danger">*</span></x-form-label>
                                <x-form-input id="lastname" name="lastname" value="{{ old('lastname') }}" />
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
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="email">Email <span class="text-danger">*</span></x-form-label>
                                <x-form-input id="email" name="email" type="email"
                                    value="{{ old('email') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="phone">Phone <span class="text-danger">*</span></x-form-label>
                                <x-form-input id="phone" name="phone" value="{{ old('phone') }}" />
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
                                <x-form-label for="department">Department</x-form-label>
                                <x-form-input id="department" name="department" value="{{ old('department') }}" />
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
                                    <option value="full_time">Full Time</option>
                                    <option value="part_time">Part Time</option>
                                    <option value="remote">Remote</option>
                                    <option value="intern">Intern</option>
                                    <option value="contractual">Contractual</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-form-label for="hire_date">Joining Date <span
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
                                <x-form-label for="pan">PAN <span class="text-danger">*</span></x-form-label>
                                <input type="file" id="panDropify" class="border" name="pan" />
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
