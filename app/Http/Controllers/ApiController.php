<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\phim;

class ApiController extends Controller
{
    public function danh_sach_phim()
    {
        $phims = phim::all();

        return response()->json($phims, Response::HTTP_OK);
    }

    public function them_phim(Request $req)
    {
        $phim = phim::create($req->all());
        return response()->json($phim, 201);
    }

    public function tim_phim($id)
    {
        $phim = phim::find($id);
        return response()->json($phim, 200);
    }

    public function sua_phim(Request $req, $id)
    {
        $phim = phim::where('id', $id)->update($req->all());

        return response()->json($phim, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phim = phim::where('id', $id)->update($req->all());

        return response()->json($phim, 200);
    }
}
