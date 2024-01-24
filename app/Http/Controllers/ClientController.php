<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve clients with optional search functionality
        $search = $request->search;
        $clients = Client::when($search, function ($q, $ser) {
            $q->where('first_name', 'like', '%' . $ser . '%');
        })->paginate();

        // Return the view displaying all clients
        return view('client.all', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Display the view for adding a new client
        return view('client.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        // Retrieve the avatar from the request
        $avatar = $request->avatar;

        // Store the avatar in the 'public' disk under the 'client/avatar' directory
        $avatar = $avatar->store('client/avatar', 'public');

        // Create a new client record with validated request data and the stored avatar path
        Client::create(array_merge($request->validated(), ['avatar' => $avatar]));

        // Redirect to the client index page after successful storage
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        // Display the view for deleting a client
        return view('client.delete', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        // Extract the file name from the avatar path
        $avatar = basename($client->avatar);

        // Display the view for editing a client along with the current avatar
        return view('client.edit', compact('client', 'avatar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        // Check if the avatar is not changed, update the record and redirect
        if (empty($request->avatar)) {
            $client->update($request->validated());
            return redirect()->route('client.index');
        }

        // Check if the avatar is changed, delete the old avatar if it exists and update the record
        $avatar = $client->avatar;
        if (Storage::disk('public')->exists($avatar)) {
            Storage::disk('public')->delete($avatar);
        }

        // Store the new avatar in the 'public' disk under the 'client/avatar' directory
        $avatar = $request->avatar;
        $avatar = $avatar->store('client/avatar', 'public');

        // Update the client record with validated request data and the new avatar path
        $client->update(array_merge($request->validated(), ['avatar' => $avatar]));

        // Redirect to the client index page after a successful update
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Delete the avatar from storage
        Storage::disk('public')->delete($client->avatar);

        // Delete the client record
        $client->delete();

        // Redirect to the client index page after successful deletion
        return redirect()->route('client.index');
    }
}
