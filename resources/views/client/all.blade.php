@extends('layout.master')
@section('content')
    {{-- Form for search functionality --}}
    <x-form action="{{ route('client.index') }}" method="get">
        <x-Label for="search" class="form-label" name="Search" />
        <x-input type="text" name="search" id='search' />
        <x-Button color="success" type='submit' name="search" />
    </x-form>

    {{-- Table using the component table --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Image</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through clients and use the client table component --}}
            @foreach ($clients as $client)
                <x-client.Table :client="$client" />
            @endforeach
        </tbody>
    </table>

    {{-- Anchor button to redirect to the client creation page --}}
    <x-AnchorButton color="primary" href="{{ route('client.create') }}" name="Add new category" />

    {{-- Display pagination links --}}
    {{ $clients->links() }}
@endsection
