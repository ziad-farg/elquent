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
        // using the search button
        $search = $request->search;
        $clients = Client::when($search, function ($q, $ser) {
            $q->where('first_name', 'like', '%' . $ser . '%');
        })->paginate();
        return view('client.all', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $avatar = $request->avatar;
        $avatar = $avatar->store('client/avatar', 'public');
        Client::create(array_merge($request->validated(), ['avatar' => $avatar]));
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('client.delete', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $avatar = basename($client->avatar);
        return view('client.edit', compact('client', 'avatar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        // checked if not change the avatar update the recode
        // and redirect to client home
        if (empty($request->avatar)) {
            $client->update($request->validated());
            return redirect()->route('client.index');
        }
        // checked if changed the avatar checked if this exist in storage or not
        $avatar = $client->avatar;
        if (Storage::disk('public')->exists($avatar)) {
            Storage::disk('public')->delete($avatar);
        }
        $avatar = $request->avatar;
        $avatar = $avatar->store('client/avatar', 'public');
        $client->update(array_merge($request->validated(), ['avatar' => $avatar]));
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        Storage::disk('public')->delete($client->avatar);
        $client->delete();
        return redirect()->route('client.index');
    }
}
