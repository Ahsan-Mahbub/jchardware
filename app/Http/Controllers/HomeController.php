<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderInformation;
use Auth;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $deliverd = OrderInformation::where('status',1)->count('id');
        $pandding = OrderInformation::where('status',2)->count('id');
        $rejected = OrderInformation::where('status',3)->count('id');
        $all = OrderInformation::count('id');
        return view('backend.layouts.dashboard', compact('deliverd','pandding','rejected','all'));
    }

    public function store(Request $request){
        
       if ($request->password) {
            $data = [
                'name'   => $request->name,
                'email'  => $request->email,
                'password'=> Hash::make($request->password),
            ];
        } else {
            $data = [
                'name'   => $request->name,
                'email'  => $request->email,
                'password' => Auth::user()->password,
            ];
        }
        
        User::where('id', Auth::user()->id)->update($data);
        return back()->with('message','Profile Update Successfully');
    }
}
