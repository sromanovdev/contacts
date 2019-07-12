<?php

namespace App\Http\Controllers;

use App\Contact;
use App\CustomAttribute;
use App\Http\Requests\MapFieldsRequest;
use Exception;
use Illuminate\Http\Request;
use Session;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', [
            'contacts' => json_encode($contacts)
        ]);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(MapFieldsRequest $request)
    {
        $filePath = Session::get('filePath');
        $rows = array_map('str_getcsv', file($filePath));
        $headerRow = array_shift($rows);

        foreach ($rows as $row) {
            $contact = new Contact();
            $customAttributes = [];
            foreach ($request->fields as $index => $field) {
                if ($field) {
                    $contact->$field = $row[$index];
                } else {
                    $customAttributes[] = new CustomAttribute([
                        'key' => $headerRow[$index],
                        'value' => $row[$index]
                    ]);
                }
            }

            $contact->save();
            $contact->customAttributes()->saveMany($customAttributes);
        }

        return response()->json([
            'status'=> 'success',
            'data'  => [
                'count_rows' => count($rows),
            ]
        ]);
    }
}
