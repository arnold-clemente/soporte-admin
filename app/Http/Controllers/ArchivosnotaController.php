<?php

namespace App\Http\Controllers;

use App\Models\Archivosnota;
use App\Http\Requests\StoreArchivosnotaRequest;
use App\Http\Requests\UpdateArchivosnotaRequest;


class ArchivosnotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArchivosnotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArchivosnotaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivosnota  $archivosnota
     * @return \Illuminate\Http\Response
     */
    public function show(Archivosnota $archivosnota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivosnota  $archivosnota
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivosnota $archivosnota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArchivosnotaRequest  $request
     * @param  \App\Models\Archivosnota  $archivosnota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArchivosnotaRequest $request, Archivosnota $archivosnota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivosnota  $archivosnota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivosnota $archivosnota)
    {
        //
    }
}
