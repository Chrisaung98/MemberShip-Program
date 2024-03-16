<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth; 
use App\Models\Point;
use App\Models\Member;
use DB;
use URL;

class AddPointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function addPoint()
    {
        return view('admin.addpoints.list');
    }

    public function redeem() 
    {

        return view('admin.redeem.list');
    }

    public function showInfo(Request $request) {
        $phone = $request->phone;
        $member_list = DB::table('members')->where('phone', $phone)->first();
        
        if ($member_list) {
            // Assuming $point_list is required for this view
            $point_list = DB::table('points')->where('employee_id', $member_list->employee_id)->get();
    
            return view('admin.addpoints.add')->with('member_list', $member_list)->with('point_list', $point_list);
        } else {
            $error = "Member not found with the provided phone number.";
            return redirect('admin/addpoints')->with('error', $error);
        }
    }
    

    public function viewPointHistory(Request $request) {
        
    }
    

    public function redeemInfo(Request $request) {
        $phone = $request->phone;
        $member_list = DB::table('members')->where('phone', $phone)->first();
        if ($member_list) {
            return view('admin.redeem.redeempoint')->with('member_list', $member_list);
        } else {
            $error = "Member not found with the provided phone number.";
            return redirect('admin/redeem')->with('error', $error);
        }
    }

    public function pointAdd (Request $request) {
        $id = $request->id;
        $employee_id = $request->employee_id;
        $point_in = $request->point_in;
        $amount = $request->amount;
        $redeem = $request->redeem;

        $pointsToAdd = floor($amount / 5000);
        $point_in += $pointsToAdd;
        
        $point = new Point;
        $point -> employee_id = $employee_id;
        $point->point_in = $point_in;
        $point->amount = $amount;
        
        $point->created_by = auth()->user()->id;
        $point->updated_by = auth()->user()->id;
        $point->save();

         // Update member table
        $member = Member::where('employee_id', $employee_id)->first();
        if ($member) {
            $member->amount += $amount; // Increment amount
            $member->member_point += $pointsToAdd;// Increment member_point
            $member->save();
        } else {
            $member = new Member;
            $member->employee_id = $employee_id;
            $member->amount = $amount;
            $member->member_point = $pointsToAdd;
            $member->save();
        }
        
        $point_list = DB::table('points')->get(); 
        return redirect('admin/addpoints')->with('point_added_success', true);
    }   

    public function pointRedeem(Request $request) {
        $id = $request->id;
        $employee_id = $request->employee_id;
        $redeem = $request->redeem;
    
        $point = new Point;
        $point->employee_id = $employee_id;
        $point->redeem = $redeem;
        $point->created_by = auth()->user()->id;
        $point->updated_by = auth()->user()->id;
        $point->save();
        
        // Update member table
        $member = Member::where('employee_id', $employee_id)->first();
    
        if ($member) {
            if ($member->member_point >= $redeem) {
                $member->member_point -= $redeem; // Decrement member_point
                $member->save();
            } else {
                return redirect('admin/redeem')->with('error', 'Not enough points to redeem.');
            }
        } else {
            return redirect('admin/redeem')->with('error', 'Member not found.');
        }
        $point_list = DB::table('points')->get();
        return redirect('/admin/redeem')->with('success', 'Points redeemed successfully.');
    }    
}
