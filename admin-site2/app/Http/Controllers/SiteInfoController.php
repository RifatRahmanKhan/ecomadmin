<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteInfo;

class SiteInfoController extends Controller
{
    //send site info
    public function sendSiteInfo(){
        //get site infos
        $result = SiteInfo::get();
        return $result;
    }
    //manage social media links
    public function socialMediaLinks(){
        $socialMedia = SiteInfo::first();
        return view('pages.siteInfo.socialMedia', compact(['socialMedia']));
    }
    //update Facebook Link
    public function updateFbLink(Request $request){
        $socialMediaLinks = SiteInfo::find(1);
        $socialMediaLinks->facebook_link = $request->fbLink;
        $socialMediaLinks->save();
        return redirect()->route('socialMediaLinks');
    }
}
