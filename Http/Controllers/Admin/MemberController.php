<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Member;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function member($value='')
    {
        $totalCount = Member::count();
        $member_list = DB::table('members')->get();
    
        return view('admin.member.list', [
            'member_list' => $member_list,
            'totalCount' => $totalCount,
        ]);
    }
    
    
    public function detail($member_id) {
        $member_list = DB::table('members')->where('id', $member_id)->first();
        $point_list = DB::table('points')->where('employee_id', $member_list->employee_id)->get();
        return view('admin.member.detail', ['member_list' => $member_list, 'point_list' => $point_list]);
    }
    public function edit($member_id) {
        $member_list = DB::table('members')->where('id',$member_id)->first();
        return view('admin.member.edit')->with('member_list',$member_list);
    } 
    
    public function update(Request $request)
    {
        $member_id = $request->member_id;
        $name = $request->name;
        $phone = $request->phone;
           
        $member = DB::table ('members')
            ->where( 'id',$member_id)
            ->update ([
                'name' => $name,
                'phone' => $phone,
                'updated_by' => auth()->user()->id
            ]);
            $member_list = DB::table('members')->where('id',$member_id)->get();
            return redirect('/admin/member')->with('success', 'Member information updated successfully');
    }

    public function filter(Request $request)
    {
        $query = Member::query();
    
        // Search by date
        $created_at = $request->input('created_at');
        if ($created_at) {
            $query->whereDate('created_at', '=', \Carbon\Carbon::parse($created_at)->format('Y-m-d'));
        }
    
        // Search by name
        $name = $request->input('name');
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
    
        $member_list = $query->get();
        $totalCount = Member::count();
    
        return view('admin.member.list', [
            'member_list' => $member_list,
            'totalCount' => $totalCount,
        ]);
    } 
}
