<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clients\StoreClientRequest;
use App\Http\Requests\Clients\UpdateClientRequest;
use App\Models\Car;
use App\Models\Client;
use GuzzleHttp\Psr7\Request;
use Inertia\Inertia;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Clients', [
            'cars' => Car::with('clients')->orderBy('id')->paginate(10),
            'csrf_token' => csrf_token(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Client_create', [
            'csrf_token' => csrf_token(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {

    Client::create($request->except(['_token']));

    return response()->json(['id_client' => Client::select('id')->where('phone', $request->get('phone'))->get()]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Inertia::render('Client_show', [
            'csrf_token' => csrf_token(),
            'client_with_cars' => Client::with('cars')->findOrFail($id),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
