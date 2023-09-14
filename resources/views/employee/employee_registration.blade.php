<x-header />
<div class="p-5">

    <h2>Employee Registration</h2>
    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data" class="form-control mt-4">
        @csrf

        <!-- Name -->
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="error">
                    <p>{{ $message }}</p>
                </span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="error">
                    <p>{{ $message }}</p>
                </span>
            @enderror
        </div>

        <!-- Department -->
        <div class="form-group mb-3">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="{{ old('department') }}" required>
            @error('department')
                <span class="error">
                    <p>{{ $message }}</p>
                </span>
            @enderror
        </div>

        <!-- Gender -->
        <div class="form-group mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                <option value="Other" @selected(old('gender') == 'Other')>Other</option>
            </select>
            @error('gender')
                <span class="error">
                    <p>{{ $message }}</p>
                </span>
            @enderror
        </div>

        <!-- Phone Number -->
        <div class="form-group mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            @error('phone_number')
                <span class="error">
                    <p>{{ $message }}</p>
                </span>
            @enderror
        </div>

        <!-- Profile Picture -->
        <div class="form-group mb-3">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            <div id="profile-container" class="p-2 text-center">
                <img src="#" alt="profile image" id="showImage" class="hide">
            </div>
            @error('profile_picture')
                <span class="error">
                    <p>{{ $message }}</p>
                </span>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('employees.index') }}"><button type="button" class="btn btn-danger">Back</button></a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<x-footer />
