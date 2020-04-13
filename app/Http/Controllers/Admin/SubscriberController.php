<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DataTables;
use DB;

class SubscriberController extends Controller
{
    public function index()
    {
        return view('admin.subscriberView');
    }

    public function destroy($id) {
    	try {
            DB::table('subscribers')->where('id', $id)->delete();

            return redirect()->back()->with('success', 'Subscriber deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', 'Something went wrong. Please try again.');
        }
    }

    public function datatable()
    {
        return DataTables::of(DB::table('subscribers'))
            ->addColumn('manage', function ($subscriber) {
                return '<a href="subscriber/' . $subscriber->id . '/delete" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['manage'])
            ->make(true);
    }
}
