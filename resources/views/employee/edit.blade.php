<x-header />

<div class="p-5">

    <h2>Edit Employee Details</h2>
    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data" class="form-control mt-4">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
        </div>

        <!-- Department -->
        <div class="form-group mb-3">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="{{ old('department', $employee->department) }}" required>
        </div>

        <!-- Gender -->
        <div class="form-group mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male" {{ old('gender', $employee->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $employee->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender', $employee->gender) === 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <!-- Phone Number -->
        <div class="form-group mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $employee->phone_number) }}" required>
        </div>

        <!-- Profile Picture -->
        <div class="form-group mb-3">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            <div id="profile-container" class=" text-center p-2">
                @if ($employee->profile_picture)
                    <img src="{{ asset('storage/profilePictures/' . $employee->profile_picture) }}" id="showImage" alt="Current Profile Picture">
                @endif
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('employees.index') }}"><button type="button" class="btn btn-danger">Back</button></a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<x-footer />
