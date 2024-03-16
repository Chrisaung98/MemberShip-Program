<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth; 
use App\Models\Member;
use App\Models\MemberID;
use DB;
use URL;

class CreateMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {       
        $member_list = DB::table('members')->get();
        $member_id = MemberID::orderBy('id','desc')->first();

        if (isset($member_id)) {
            $last_member_id = $member_id->generated_ID + 1;
            $last_member_id = str_pad($last_member_id,4,"0",STR_PAD_LEFT);
        } else {
            $last_member_id = '0001';
        }

        $member_id_gen = new MemberID;
        $member_id_gen->generated_ID = $last_member_id;     
        $member_id_gen->created_by = auth()->user()->id;
        $member_id_gen->updated_by = auth()->user()->id;
        $member_id_gen->save();

        return redirect('/admin/create/'.$last_member_id);

    }

    public function memberCreateIndex($member_id)
    {
        return view('admin.create.list')->with('member_id', $member_id);
    }

    
    public function addMember(Request $request)
    {
        $member_id = 'KT_M_'.$request->member_id;
        $name = $request->name;
        $phone = $request->phone;
        $amount = $request->amount;
        $member_point = $request->member_point;
    
        $member = new Member;
        $member->employee_id = $member_id;
        $member->name = $name;
        $member->phone = $phone;
        $member->amount = $amount;
        $member->member_point = $member_point;    
        $member->created_by = auth()->user()->id;
        $member->updated_by = auth()->user()->id;
        $member->save();

        return redirect('/admin/member');
    }
}
