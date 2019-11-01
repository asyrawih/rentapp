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
        'Content-Type'  => 'application/json',
        'X-Request-with' => 'XMLHttpRequest'
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
            'no_hp'     => 'required|numeric',
            'alamat'    => 'required',
            'rekening'  => 'required|numeric'
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
        //
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
        //
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
