<?php

namespace WebSim\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use WebSim\File;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $files = DB::table('files')->where('userId', '=', $user->id)->get();

        return view('files', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('fileForm', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required',
            'file' => 'required',
            'file.*' => 'mimes:txt',
            'name' => 'required',
        ]);

        if (($request->file('file')->extension()) != "txt") {
            return back();
        }

        if ($request->hasfile('file')) {
            $file = new File;
            $file->created_at = time();
            $file->updated_at = time();
            $file->name = $request->name;
            $file->userId = $request->userId;
            $path = $request->file->store('files');
            Storage::setVisibility($path, 'private');
            $file->file = $path;
            $file->save();
        }
        return back()
            ->with('success', 'Arquivo enviado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, File $file)
    {
        $file->delete();
        $request->session()->flash('message', 'Arquivo excluído com sucesso!');
        return back()
            ->with('success', 'Arquivo excluído com sucesso.');
    }
}