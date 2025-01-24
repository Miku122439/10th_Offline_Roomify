<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    private $user;

    // public function index()
    // {
    //     return view('admin.users.index');
    // }

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $all_users = $this->user->latest()->paginate(5);

        return view('admin.users.index')->with('all_users', $all_users);
    }

    // public function search(Request $request)
    // {
    //     $users = $this->user->where('name', 'like', '%' . $request->search  . '%')->get()->except(Auth::user()->id);

    //     return view('admin.users.search')
    //             ->with('users', $users)
    //             ->with('search', $request->search);
    // }


}
