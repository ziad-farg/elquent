@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <!-- Display the heading for adding a new category -->
        <h2>Add new category</h2>

        <!-- Include a reusable form component with specified attributes -->
        <x-form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">

            <!-- Input field for 'First Name' with label, error handling, and value from old input -->
            <div class="mb-3">
                <x-label for="first_name" class="form-label" name="First Name" />
                <x-input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name') }}" />
                @error('first_name')
                    {{ $message }}
                @enderror
            </div>

            <!-- Input field for 'Last Name' with label, error handling, and value from old input -->
            <div class="mb-3">
                <x-label for="last_name" class="form-label" name="Last Name" />
                <x-input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name') }}" />
                @error('last_name')
                    {{ $message }}
                @enderror
            </div>

            <!-- Input field for 'E-mail' with label, error handling, and value from old input -->
            <div class="mb-3">
                <x-label for="email" class="form-label" name="E-mail" />
                <x-input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <!-- Input field for 'Phone' with label, error handling, and value from old input -->
            <div class="mb-3">
                <x-label for="phone" class="form-label" name="Phone" />
                <x-input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" />
                @error('phone')
                    {{ $message }}
                @enderror
            </div>

            <!-- Input field for 'Image' (avatar) with label, error h
