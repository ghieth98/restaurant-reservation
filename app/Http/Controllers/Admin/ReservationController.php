<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $reservations = Reservation::with('table')->paginate(5);

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $tables = Table::all()->pluck('name', 'id');

        return \view('admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReservationRequest $request
     * @return RedirectResponse
     */
    public function store(StoreReservationRequest $request): RedirectResponse
    {
        Reservation::create($request->validated());

        return redirect()->route('admin.reservations.index')
            ->with('toast_success', 'Reservations created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Reservation $reservation
     * @return Application|Factory|View
     */
    public function show(Reservation $reservation): View|Factory|Application
    {
        return \view('admin.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reservation $reservation
     * @return Application|Factory|View
     */
    public function edit(Reservation $reservation): View|Factory|Application
    {
        $tables = Table::all()->pluck('name', 'id');

        return \view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReservationRequest $request
     * @param Reservation $reservation
     * @return RedirectResponse
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation): RedirectResponse
    {
        $reservation->update($request->validated());

        return redirect()->route('admin.reservations.index')
            ->with('toast_success', 'Reservations updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reservation $reservation
     * @return RedirectResponse
     */
    public function destroy(Reservation $reservation): RedirectResponse
    {
        $reservation->delete();

        return back()->with('toast_success', 'Reservations deleted successfully');
    }
}
