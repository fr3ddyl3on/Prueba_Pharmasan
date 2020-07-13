<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Role;
use App\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess','listclient.index');

        $clients = Client::orderBy('id','ASC')->paginate(2);
        return view('client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        Gate::authorize('haveaccess','Createclient.create');

        $permissions = Permission::get();
        return view('client.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess','Createclient.create');

        $request->validate([
            'nombre'       => 'required|max:50|unique:clients,nombre,',
            'documento'    => 'required|max:20|unique:clients,documento,',
            'email'        => 'required|max:50|unique:users,email,',
            'direccion'    => 'required|max:100|'
        ]);
        
        $client = Client::create($request->all());

        return redirect()->route('client.index')
            ->with('status_success', 'Cliente Creado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        Gate::authorize('haveaccess','editclient.edit');

        $roles = Role::orderBy('nombre')->get();
        return view('client.edit', compact('roles','client'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        Gate::authorize('haveaccess','editclient.edit');

        $request->validate([
            'nombre'       => 'required|max:50|unique:clients,nombre,'.$client->id,
            'documento'    => 'required|max:20|unique:clients,documento,'.$client->id,
            'email'        => 'required|max:50|unique:users,email,'.$client->id,
            'direccion'    => 'required|max:100|'
        ]);

        $client->update($request->all());

        return redirect()->route('client.index')
            ->with('status_success', 'Cliente Actualizado Exitosamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Gate::authorize('haveaccess','deletclient.destroy');

        $client->delete();
        return redirect()->route('client.index')
            ->with('status_success', 'Cliente Eliminado Exitosamente');
    }
}
