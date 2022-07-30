<?php

namespace App\Repository;

use App\Models\Contact;

class ContactRepository 
{
    public function getAll()
    {
        // query
        $contact = Contact::orderBy('name')
        ->where('active', 1)
        ->where('number', 'LIKE', '+%')
        ->get()
        ->map(function ($contact) {
            // return [
            //     'contact_id' => $contact->id,
            //     'name' => $contact->name,
            //     'status' => $contact->active ? 'active' : 'inactive',
            // ];
            return $this->format($contact);
        });

        return $contact;
    }

    public function findByid($id)
    {
        $contact = Contact::where('id', $id)->firstOrfail();
        return $this->format($contact);
    }

    public function format($contact)
    {
        // format dari map
        return [
            'contact_id' => $contact->id,
            'name' => $contact->name,
            'status' => $contact->active ? 'active' : 'inactive',
        ];
    }
}