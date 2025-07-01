<x-layout>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('employee.create') }}" class="btn btn-primary">Create Employee</a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>F_name</th>
                                    <th>M_name</th>
                                    <th>L_name</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Job Title</th>
                                    <th>Department</th>
                                    <th>Employee ID</th>
                                    <th>Employee Type</th>
                                    <th>Joining Date</th>
                                    <th>offer letter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->middle_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->dob }}</td>
                                        <td>{{ $employee->gender }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone_number }}</td>
                                        <td>{{ $employee->address }}</td>
                                        <td>{{ $employee->job_title }}</td>
                                        <td>{{ $employee->department->name }}</td>
                                        <td>{{ $employee->employee_id }}</td>
                                        <td>{{ $employee->employee_type }}</td>
                                        <td>{{ $employee->joining_date }}</td>
                                        <td><a href="{{ asset('storage/' . $employee->offer_letter) }}"
                                                target="_blank">View</a></td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
