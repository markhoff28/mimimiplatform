<?php

namespace App\Http\Controllers\Backoffice\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class SeoController extends Controller
{
    public function index()
    {
        $seo = Seo::find(1);
        return view('backoffice.marketing.seo.update', compact('seo'));
    } // End Method

    public function update(Request $request)
    {
        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);

        $notification = array(
            'message' => 'SEO Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('seo.index')->with($notification);
    } // End Method
}
