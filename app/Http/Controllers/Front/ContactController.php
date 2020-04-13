<?php

namespace App\Http\Controllers\Front;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('front.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|max:100',
            'mobileno' => 'required|max:30',
            'message'  => 'required',
        ]);

        $data = $request->all();

        Contact::create($data);

        return redirect()->back()->with('success', 'Contact submited successfully!');
    }
}
