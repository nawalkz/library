@extends('layouts.profile')

@section('content')
    <div class="profile-container">
        <h2>👤 My Profile</h2>

        <!-- Profile Info Section -->
        <div class="profile-section">
            <h3>🧾 Profile Information</h3>
            <p>Update your account's profile information and email address.</p>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="adresse">Address</label>
                    <input type="text" name="adresse" value="{{ old('adresse', Auth::user()->adresse) }}">
                </div>

                <div class="form-group">
                    <label for="telephone">Phone</label>
                    <input type="text" name="telephone" value="{{ old('telephone', Auth::user()->telephone) }}">
                </div>

                <div class="form-group">
                    <label for="ville">City</label>
                    <input type="text" name="ville" value="{{ old('ville', Auth::user()->ville) }}">
                </div>

                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input type="file" name="image">
                </div>

                <button type="submit" class="submit-button">Save</button>
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="profile-section">
            <h3>🔐 Change Password</h3>
            <p>Use a long and secure password to protect your account.</p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="submit-button">Save</button>
            </form>
        </div>

        <!-- Delete Account Section -->
        <div class="delete-account-section">
            <h3>⚠️ Delete Account</h3>
            <p>Once your account is deleted, all of its resources and data will be permanently removed. Please back up any important data before proceeding.</p>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="delete-button">Delete Account</button>
            </form>
        </div>
    </div>
@endsection
