<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contactView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        try {
            $contact->delete();

            return redirect()->route('contact.index')->with('success', 'Contact deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('contact.index')->with('failed', 'Something went wrong. Please try again.');
        }
    }

    public function datatable()
    {
        return DataTables::of(Contact::query())
            ->addColumn('manage', function ($contact) {
                return '<a href="contact/' . $contact->id . '/delete" class="btn btn-sm btn-outline-danger ml-5"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['manage'])
            ->make(true);
    }
}
