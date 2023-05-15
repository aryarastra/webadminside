<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;

class LaporanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pengaduan::GET();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  $validatedData = $request->validate([
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'name' => 'required|email|unique:users,email',
        //     'telepon' => 'required|min:8',
        //     'lokasi' => 'required',
        //     'jenis' => 'required',
        //     // 'created_at' => 'required',
        //     'description' => 'required'
        // ]);
        // $validatedData = [
        //     'name' => 'Ahsiap',
        //     'telepon' => '08123',
        //     'lokasi' => 'malang',
        //     'user_id' => '1',
        //     'description' => 'asdasfas',
        //     'image' => 'yey',
        //     'status' => 'Belum di Proses',
        //     'jenis' => 'Pengaduan',
        //     // 'created_at' => date("Y-m-d H:i:s"),
        //     // 'updated_at' => date("Y-m-d H:i:s"),
        // ];
        $validatedData = $request->all();
        // Log::debug($validatedData);
        // $validator = Validator::make($request->all(), $validatedData);
        $image_path = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $image_path;


        // // // Create a new user with the validated data
        $pengaduan = Pengaduan::create($validatedData);

        // // // Return a response

        // // if ($validator->fails()) {
        // //     return response()->json([
        // //         'error' => $validator->errors(),
        // //     ], 422);
        // // }
        return response()->json([
            'message' => 'Pengaduan created successfully',
            'data' => $pengaduan
        ], 200);
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
