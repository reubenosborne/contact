<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = File::all();

        return $files;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = new File();

        $file->fill($request->all());

        $file->save();

        return $file;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);

        if (is_null($file)) {
            return response()->json(['error'=>'No file found with ID '.$id], 404);
        }

        return $file;
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
        $file = File::find($id);

        if (is_null($file)) {
            return response()->json(['error'=>'No file found with ID '.$id], 404);
        }

        $file->fill($request->all());

        $file->save();

        return $file;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);

        if (is_null($file)) {
            return response()->json(['error'=>'No file found with ID '.$id], 404);
        }

        $file->delete();

        unlink(public_path('assets/files/' . $file->contact->name . '/' . $file->name));

        return $file;
    }
}
