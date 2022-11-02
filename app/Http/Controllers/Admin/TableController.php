<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tables = Table::paginate(5);

        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTableRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTableRequest $request): RedirectResponse
    {
        Table::create($request->validated());

        return redirect()->route('admin.tables.index')
            ->with('toast_success', 'Table created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Table $table
     * @return Application|Factory|View
     */
    public function show(Table $table)
    {
        return \view('admin.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Table $table
     * @return Application|Factory|View
     */
    public function edit(Table $table)
    {
        return \view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Table $table
     * @return RedirectResponse
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        $table->update($request->validated());

        return redirect()->route('admin.tables.index')
            ->with('toast_success', 'table updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Table $table
     * @return RedirectResponse
     */
    public function destroy(Table $table)
    {
        $table->delete();

        return back()->with('toast_success', 'table deleted successfully');
    }
}
