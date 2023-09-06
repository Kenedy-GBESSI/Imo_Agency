<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.options.index',[
            'options' => Option::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();
        return view('admin.options.create',[
            'option' => $option
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request)
    {
         Option::create($request->validated());
         return to_route('admin.option.index')->with('success','L\'option a été bien créée');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {

        return view('admin.options.create',[
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success','L\'option a été bien modifiée');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success','L\'option a été bien supprimée');
    }
}
