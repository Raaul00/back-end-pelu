<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::with(['client', 'service', 'employee'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
            'employee_id' => 'required',
            'reservation_time' => 'required|date',
        ]);

        return Reservation::create($request->all());
    }

    public function show($id)
    {
        return Reservation::with(['client', 'service', 'employee'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return $reservation;
    }

    public function destroy($id)
    {
        Reservation::destroy($id);
        return response()->noContent();
    }
}
