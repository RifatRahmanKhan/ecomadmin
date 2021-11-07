<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorDetails;

class VisitorDetailsController extends Controller
{
    //index for admin
    public function index(){
        $visitorDetails = VisitorDetails::orderBy('visit_date', 'desc')->orderBy('visit_time', 'desc')->get();
        return view('pages.visitorDetails.manage', compact('visitorDetails'));
    }
    
    //get visitor details
    public function getVisitorDetails(){
        $ip_address = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $visit_date = date("d-m-y");
        $visit_time = date("h:i:sa");

        //insertion to database
        $result = VisitorDetails::insert([
            'ip_address' => $ip_address,
            'visit_date' => $visit_date,
            'visit_time' => $visit_time,
        ]);

        return $result;
    }

    public function destroy($id)
    {
        $visitorDetail = VisitorDetails::find($id);

        if ( !is_null($visitorDetail) ){
            $delete = $visitorDetail->delete();
        }

        return redirect()->route('visitorDetails.manage');
    }
}
