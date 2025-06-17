<?php

namespace App\Http\Controllers\Backoffice\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;

class SmtpController extends Controller
{
    public function smtpSetting()
    {
        $smtp = SmtpSetting::find(1);
        return view('backoffice.setting.smtp.smpt_update', compact('smtp'));
    } // End Method

    public function smtpUpdate(Request $request)
    {
        $smtp_id = $request->id;
        SmtpSetting::find($smtp_id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,
        ]);
        $notification = array(
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
