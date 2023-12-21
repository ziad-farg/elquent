@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2>Edit client</h2>
        <div>
            <img width="300" src="{{ asset('storage/' . $client->avatar) }}" alt="" id="avatarPreview">
        </div>
        <x-form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            <div class="mb-3">
                <x-label for="first_name" class="form-label" name="First Name" />
                <x-input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ old('first_name') ?? $client->first_name }}" />
                @error('first_name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <x-label for="last_name" class="form-label" name="Last Name" />
                <x-input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name') ?? $client->last_name }}" />
                @error('last_name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <x-label for="email" class="form-label" name="E-mail" />
                <x-input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email') ?? $client->email }}" />
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <x-label for="phone" class="form-label" name="Phone" />
                <x-input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone') ?? $client->phone }}" />
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
            <x-button type="submit" color="success" name="Save" />
            <x-AnchorButton href="{{ route('client.index') }}" color="primary" name="Cancel" />
        </x-form>
    </div>
@endsection

{{-- when change the image preview the image live --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');

        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                avatarPreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        });
    });
</script>
