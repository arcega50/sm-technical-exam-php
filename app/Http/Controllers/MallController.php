<?php

namespace App\Http\Controllers;

use App\Models\Mall;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MallController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('malls.create');
    }

    /**
     * Store mall
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        Mall::create([
            'name'        => $request->name,
            'slug'        => str($request->name)->slug(),
            'description' => $request->description
        ]);

        return redirect()->route('dashboard')
                ->with('message', 'Mall successfully created.');
    }

    public function edit(Mall $mall): View
    {
        return view('malls.edit', compact('mall'));
    }

    public function update(Mall $mall, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:malls,name,' . $mall->id,
            'description' => 'nullable'
        ]);

        $mall->update([
            'name'        => $request->name,
            'slug'        => str($request->name)->slug(),
            'description' => $request->description
        ]);

        return redirect()->route('dashboard')
                ->with('message', 'Mall successfully updated.');
    }
}
