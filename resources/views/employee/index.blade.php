<x-header />

<div class="p-5">
    <h2>Employee List</h2>

    <a href="{{ route('employees.create') }}" class="btn btn-primary my-3">Add Employee</a>

    @if(session('success'))
        <div class="success" id="success-alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <table class="table table-responsive border rounded">
        <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $employee['id'] }}</td>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['email'] }}</td>
                    <td>{{ $employee['department'] }}</td>
                    <td>{{ $employee['gender'] }}</td>
                    <td>{{ $employee['phone_number'] }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $employees->links() }}
    </div>
</div>

<x-footer />
