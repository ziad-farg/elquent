@extends('layout.master')
@section('content')
    {{-- this code for search button --}}
    <x-form action="{{ route('client.index') }}" method="get">
        <x-Label for="search" class="form-label" name="Search" />
        <x-input type="text" name="search" id='search' />
        <x-Button color="success" type='submit' name="search" />
    </x-form>
    {{-- this use the component table --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Lasr Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Image</th>
                <th scope="col">Handel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <x-client.Table :client="$client" />
            @endforeach
        </tbody>
    </table>
    <x-AnchorButton color="primary" href="{{ route('client.create') }}" name="Add new category" />
    {{ $clients->links() }}
@endsection
