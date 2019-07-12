<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class FilesController extends Controller
{
    public function store(UploadRequest $request)
    {
        $name = 'tmp-' . Str::random() . '-' . time();
        $file = $request->file('file');
        $file->move(public_path('uploads'), $name);
        $path = public_path('uploads') .'/'. $name;

        Session::put('filePath', $path);

        $headerRow = str_getcsv(file($path)[0]);

        $fieldOptions = array_reduce(Contact::getFields(), function($carry, $field) {
            $carry[$field] = str_replace('_', ' ', Str::title($field));
            return $carry;
        });

        return response()->json([
            'status'=> 'success',
            'data'  => [
                'fields_from_file' => $headerRow,
                'fields_from_model'=> $fieldOptions
            ]
        ]);
    }
}
