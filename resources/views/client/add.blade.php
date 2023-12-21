@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2>Add new category</h2>
        <x-form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
            {{-- @csrf --}}
            <div class="mb-3">
                <x-label for="first_name" class="form-label" name="First Name" />
                <x-input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name') }}" />
                @error('first_name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <x-label for="last_name" class="form-label" name="Last Name" />
                <x-input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name') }}" />
                @error('last_name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <x-label for="email" class="form-label" name="E-mail" />
                <x-input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <x-label for="phone" class="form-label" name="Phone" />
                <x-input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" />
                @error('phone')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <x-label for="avatar" class="form-label" name="Image" />
                <x-input class="form-control" type="file" id="avatar" name="avatar" />
                @error('avatar')
                    {{ $message }}
                @enderror
            </div>
            <x-Button color="success" name='Save' type="submit" />
            <x-AnchorButton href="{{ route('client.index') }}" color="primary" name="Cancel" />
        </x-form>
    </div>
@endsection
