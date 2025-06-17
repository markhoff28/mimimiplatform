<?php

namespace App\Http\Controllers\Backoffice\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SiteController extends Controller
{
    public function siteSetting()
    {
        $site = SiteSetting::find(1);
        return view('backoffice.setting.site.site_update', compact('site'));
    } // End Method

    public function siteUpdate(Request $request)
    {
        $site_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $img = $manager->read($image);
            $save_url = 'upload/logo/' . $name_gen;
            $img->resize(200, 60)->save(public_path($save_url));

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'support_email' => $request->support_email,
                'openingHours' => $request->openingHours,
                'copyright' => $request->copyright,
                'logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'support_email' => $request->support_email,
                'openingHours' => $request->openingHours,
                'copyright' => $request->copyright,
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // End Eles 
    } // End Method
}
