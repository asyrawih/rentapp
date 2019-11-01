<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Owner;

class OwnerController extends Controller
{
    /**
     * Headers
     */

   public $headers = [
        'Access-Control-Allow-Origin'      => '*',
        'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Max-Age'           => '86400',
        'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $owner = Owner::all();

        if (Owner::count() <= 0) {
            return response()->json([
                'status'    => true,
                'pesan'     => 'data tidak ada',
                'headers'   => $this->headers
            ], 404);
        } else {

            return response()->json([
                'status'    => true,
                'data'      => $owner,
                'headers'   => $this->headers
            ], 200, $this->headers);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'no_hp'         => 'required|numeric',
            'alamat'        => 'required',
            'rekening'      => 'required',
            'no_rekening'   => 'required|numeric'
        ]);

        if ($validator) {
            $owner = new Owner();
            $owner->firstOrCreate($request->all());
            return \response()->json([
                'status'    => true,
                'messages'  => 'data berhasil di buat'
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Owner::where('owner_id', $id)->get();
        if ($owner->count() <= 0) {
            return \response()->json([
                'status'    => false,
                'messages'  => 'data tidak di temukan'
            ], 404);
        }
        return \response()->json([
            'status'    => true,
            'data'      => $owner
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // cek jika Validator Is Valid
        $owner = Owner::where('owner_id', $id)->update($request->all());
        if ($owner == TRUE) {
            return response()->json([
                'status'    => true,
                'messages'  => 'Data berhasil di update'
            ], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
