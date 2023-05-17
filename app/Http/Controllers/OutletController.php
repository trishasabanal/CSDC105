<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the outlet
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('manage_outlet');

        $outletQuery = Outlet::query();
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outletQuery = outletQuery->paginate(25);

        return view('outlets.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new outlet
     *
     * @return \Illuminate\View
     */
    public function create()
    {
        $this->authorize('create', new Outlet);

        return view('outlets.create');
    }

    /**
     * Store newly created outlet in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Outlet);

        $newOutlet = $request->validate([
            'name' => 'required|max:60',
            'address' => 'nullable|max:255',
            'latitude' => 'nullable|required_with:longitude|max:15',
            'address' => 'nullable|required_with:longitude|max:15',
        ]);

        $newOutlet['creator_id'] = auth()->id();
        $Outlet = Outlet::create($newOutlet);

        return redirect()->route('outlets.show', $outlet);
    }

    /**
     * Display the specified outlet
     *
     * @param \App\Outlet $outlet
     * @return \Illuminate\View\View
     */
    public function show(Outlet $outlet)
    {
        return view('outlets.show', compact('outlet'));
    }

    /**
     * Show the form for editing the specified outlet.
     *
     * @param \App\Outlet $outlet
     * @return \Illuminate\View\View
     */
    public function edit(Outlet $outlet)
    {
        $this->authorize('update', $outlet);
        
        return view('outlets.edit', compact('outlet'));
    }

    /**
     * Update specified outlet in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Outlet $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Outlet $outlet)
    {
        $this->authorize('update', $outlet);
        
        $OutletData = $request->validate([
            'name' => 'required|max:60',
            'address' => 'nullable|max:255',
            'latitude' => 'nullable|required_with:longitude|max:15',
            'address' => 'nullable|required_with:longitude|max:15',
        ]);

        $Outlet->update($outletData);

        return redirect()->route('outlets.show', $outlet);
    }

    /**
     * Remove specified outlet from storage
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Outlet $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Outlet $outlet)
    {
        $this->authorize('delete', $outlet);
        $request->validate(['outlet_id' => 'required']);

        if($request->get('outlet_id') == $outlet->id && $outlet->delete()){
            return redirect()->route('outlets.index');
        }

        return back();     
    }
}