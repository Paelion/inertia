<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index()
    {
        return Inertia::render('Client/Index', [
            'clients' => Client::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Client/Create');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return Inertia::render('Client/Edit', [
            'client' => $client
        ]);
    }

    public function update($id)
    {
       $data = array_merge(request()->all());

       $validator = Validator::make($data, [
           'description'      => 'required',
           'company_name'     => 'required',
           'legal_status'     => 'required',
           'capital'          => 'required',
           'siret'            => 'required',
           'code_naf'         => 'required',
           'country'          => 'required',
           'address'          => 'required',
           'zip_code'         => 'required',
           'city'             => 'required',
           'projects'         => 'required'
       ]);

       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator);
       }

        $client = Client::find($id);
        $client->description = request()->get('description');
        $client->company_name = request()->get('company_name');
        $client->legal_status = request()->get('legal_status');
        $client->capital = request()->get('capital');
        $client->siret = request()->get('siret');
        $client->code_naf = request()->get('code_naf');
        $client->country = request()->get('country');
        $client->address = request()->get('address');
        $client->zip_code = request()->get('zip_code');
        $client->city = request()->get('city');
        $client->projects = request()->get('projects');
        $client->save();

        return redirect()->route('client.index');
    }

    public function store()
    {
        $data = array_merge(request()->all());

        $validator = Validator::make($data, [
            'description'      => 'required',
            'company_name'     => 'required',
            'legal_status'     => 'required',
            'capital'          => 'required',
            'siret'            => 'required',
            'code_naf'         => 'required',
            'country'          => 'required',
            'address'          => 'required',
            'zip_code'         => 'required',
            'city'             => 'required',
            'projects'         => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $client = new Client();
        $client->description = request()->get('description');
        $client->company_name = request()->get('company_name');
        $client->legal_status = request()->get('legal_status');
        $client->capital = request()->get('capital');
        $client->siret = request()->get('siret');
        $client->code_naf = request()->get('code_naf');
        $client->country = request()->get('country');
        $client->address = request()->get('address');
        $client->zip_code = request()->get('zip_code');
        $client->city = request()->get('city');
        $client->projects = request()->get('projects');
        $client->save();

        return redirect()->route('client.index');
    }

    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('client.index');
    }

}
