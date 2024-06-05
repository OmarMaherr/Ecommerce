<?php

namespace App\Http\Controllers;

use App\DataTables\ContactDataTable;
use App\Models\ContactEmail;
use App\Models\ContactEmailsStatus;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index(ContactDataTable $dataTable)
    {
        return $dataTable->render('admin.contact.contact');
    }

    public function change_status(Request $request)
    {

        $validatedData = $request->validate([
            'contact_id' => 'required',
            'contact_emails_status_id' => 'required',
        ]);

        $contact = ContactEmail::findOrFail($validatedData['contact_id']);

        $contact->contact_emails_status = $validatedData['contact_emails_status_id'];
        $contact->save();

        return redirect()->back()->with('success', 'Contact status updated successfully.');
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
    }

    public function show($id)
    {


        $contactStatus = ContactEmailsStatus::all();
        $contact = ContactEmail::findOrFail($id);
        $contact_emails_status = $contact->contact_emails_status;

        return response()->json(['options' => $contactStatus, "contact_emails_status" => $contact_emails_status]);
    }


    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        dd($request);
    }


    public function destroy($cartId)
    {
    }
}
