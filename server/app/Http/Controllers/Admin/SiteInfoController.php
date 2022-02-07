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
}
