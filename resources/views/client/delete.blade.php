@extends('layout.master')
@section('style')
    <style>
        /* Center the content vertically */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card w-50">
                <!-- Display client avatar with styling -->
                <img style="width: 360px; " src="{{ asset('storage/' . $client->avatar) }}"
                    class="card-img-top rounded mx-auto d-block" alt="...">
                <div class="card-body ">
                    <!-- Display client information -->
                    <h5 class="card-title">Hello, {{ $client->first_name . ' ' . $client->last_name }}</h5>
                    <h5 class="card-title">E-mail Address: {{ $client->email }}</h5>
                    <h5 class="card-title">Phone: {{ $client->phone }}</h5>

                    <!-- Form for deleting the client -->
                    <x-form action="{{ route('client.destroy', $client->id) }}" method="POST">
                        @method('DELETE')
                        <!-- Submit button to delete the client with danger color -->
                        <x-input class="btn btn-danger" type="submit" value="Delete" />
                        <!-- Anchor button to cancel and redirect to the client index page with primary color -->
                        <x-AnchorButton href="{{ route('client.index') }}" color="primary" name="Cancel" />
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
