<?php

namespace WebSim\Http\Controllers;

use Illuminate\Http\Request;
use WebSim\File;

class FileController extends Controller
{
    public function files()
    {
        return view('files');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [

            'file' => 'required',
            'file.*' => 'mimes:txt|max:4096',
        ]);

        if ($request->hasfile('file')) {

            $files = $request->file('file');

            for ($i = 0; $i < count($files); $i++) {
                $file = new File;
                $file->name = $files[$i]->getClientOriginalName();

                $file->file = $file->name . '.' . $files[$i]->getClientOriginalExtension();
                $files[$i]->move(public_path() . '/files/', $file->file);

                $file->created_at = time();
                $file->updated_at = time();
                $file->save();
                
            }
            return back()
                    ->with('success', 'Arquivo enviado com sucesso.');
                    //->with('image', $imageName);
        }
    }
}