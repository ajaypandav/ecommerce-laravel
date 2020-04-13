<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use File;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $site_title = DB::table('options')->where('key', '=', 'site_title')->first();
        $favicon    = DB::table('options')->where('key', '=', 'favicon')->first();
        $logo       = DB::table('options')->where('key', '=', 'logo')->first();

        $setting = array(
            'site_title' => $site_title->value,
            'favicon'    => $favicon->value,
            'logo'       => $logo->value,
        );

        return view('admin.settings')->with('setting', $setting);
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'required|max:255',
            'logo'       => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'favicon'    => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        DB::table('options')->where('key', '=', 'site_title')->update(['value' => $request->site_title, 'updated_at' => \Carbon\Carbon::now()]);

        if ($request->hasFile('favicon')) {
            $favicon    = $request->file('favicon');
            $name       = 'favicon-' . time() . '.' . $favicon->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/');
            $favicon->move($uploadPath, $name);

            $oldFavicon = DB::table('options')->where('key', '=', 'favicon')->first();

            if (!empty($oldFavicon->value)) {
                $image = 'uploads/' . $oldFavicon->value;
                File::delete($image);
            }

            DB::table('options')->where('key', '=', 'favicon')->update(['value' => $name, 'updated_at' => \Carbon\Carbon::now()]);
        }

        if ($request->hasFile('logo')) {
            $logo       = $request->file('logo');
            $name       = 'logo-' . time() . '.' . $logo->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/');
            $logo->move($uploadPath, $name);

            $oldlogo = DB::table('options')->where('key', '=', 'logo')->first();

            if (!empty($oldlogo->value)) {
                $image = 'uploads/' . $oldlogo->value;
                File::delete($image);
            }

            DB::table('options')->where('key', '=', 'logo')->update(['value' => $name, 'updated_at' => \Carbon\Carbon::now()]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
