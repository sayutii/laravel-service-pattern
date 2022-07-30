<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Repository\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function index()
    {
        $contact = $this->contactRepository->getAll();
        // $contact = Contact::orderBy('name')
        // ->where('active', 1)
        // ->where('number', 'LIKE', '+%')
        // ->get()
        // ->map(function ($contact) {
        //     return [
        //         'contact_id' => $contact->id,
        //         'name' => $contact->name,
        //         'status' => $contact->active ? 'active' : 'inactive',
        //     ];
        // }); 
        return $contact;
    }

    public function show($id)
    {
        $contact = $this->contactRepository->findByid($id);
        return $contact;
    }
}
