<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AccommodationController extends Controller
{
    
    private $accommodation;
    private $user;

    public function __construct(Accommodation $accommodation, User $user)
    {
        $this->accommodation = $accommodation;
        $this->user = $user;
    }

    public function index()
    {
        $all_accommodations = $this->accommodation->withTrashed()->latest()->paginate(8);

        return view('admin.accommodation.index')->with('all_accommodations', $all_accommodations);
    }

    public function activate($id){

        $this->accommodation->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }

    public function deactivate($id)
    {
        $this->accommodation->destroy($id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $users = $this->user->where('name', 'like', '%' . $request->search  . '%')->get()->except(Auth::user()->id);
        $accommodations = $this->accommodation->where('name', 'like', '%' . $request->search  . '%')->get()->except(Auth::user()->id);

        $search = $request->search;
        
        $users->transform(function ($user) use ($search) {
            $user->highlighted_name = preg_replace("/(" . preg_quote($search, '/') . ")/i", '<mark>$1</mark>', $user->name);
            return $user;
        });
    
        $accommodations->transform(function ($accommodation) use ($search) {
            $accommodation->highlighted_name = preg_replace("/(" . preg_quote($search, '/') . ")/i", '<mark>$1</mark>', $accommodation->name);
            return $accommodation;
        });
        

        return view('admin.accommodation.search')
                ->with('users', $users)
                ->with('accommodations', $accommodations)
                ->with('search', $request->search);
    }
}
