<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $contact = new Contact;
        $form = $request->all();

        unset($form['_token']);

        $contact->fill($form)->save();

        return redirect('/');
    }
}
