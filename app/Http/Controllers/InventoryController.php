<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return Inventory::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        return Inventory::create($request->all());
    }

    public function show($id)
    {
        return Inventory::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());
        return $inventory;
    }

    public function destroy($id)
    {
        Inventory::destroy($id);
        return response()->noContent();
    }
}
