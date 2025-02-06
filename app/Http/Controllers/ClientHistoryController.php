<?php

namespace App\Http\Controllers;

use App\Models\ClientHistory;
use Illuminate\Http\Request;

class ClientHistoryController extends Controller
{
    public function index()
    {
        return ClientHistory::with(['client', 'service'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
        ]);

        return ClientHistory::create($request->all());
    }

    public function show($id)
    {
        return ClientHistory::with(['client', 'service'])->findOrFail($id);
    }

    public function destroy($id)
    {
        ClientHistory::destroy($id);
        return response()->noContent();
    }
}
