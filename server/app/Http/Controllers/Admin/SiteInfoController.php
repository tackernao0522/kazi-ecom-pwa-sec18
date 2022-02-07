<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    public function allSiteInfo()
    {
        $result = SiteInfo::all();

        return $result;
    }

    public function getSiteInfo()
    {
        $siteinfo = SiteInfo::find(1);

        return view('backend.site_info.siteinfo_update', compact('siteinfo'));
    }

    public function updateSiteInfo(Request $request, $id)
    {
        $siteinfo = SiteInfo::findOrFail($id);

        $siteinfo->about = $request->about;
        $siteinfo->refund = $request->refund;
        $siteinfo->parchase_guide = $request->parchase_guide;
        $siteinfo->privacy = $request->privacy;
        $siteinfo->address = $request->address;
        $siteinfo->android_app_link = $request->android_app_link;
        $siteinfo->ios_app_link = $request->ios_app_link;
        $siteinfo->facebook_link = $request->facebook_link;
        $siteinfo->twitter_link = $request->twitter_link;
        $siteinfo->instagram_link = $request->instagram_link;
        $siteinfo->copyright_text = $request->copyright_text;
        $siteinfo->save();

        $notification = array(
            'message' => 'SiteInfo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
