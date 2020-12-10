<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\phim;
use Illuminate\Http\Request;
use App\Http\Resources\Phim as PhimResource;

class PhimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phims = phim::all();
    
        return PhimResource::collection($phims);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\phim  $phim
     * @return \Illuminate\Http\Response
     */
    public function show(phim $phim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phim  $phim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phim $phim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\phim  $phim
     * @return \Illuminate\Http\Response
     */
    public function destroy(phim $phim)
    {
        //
    }
}
