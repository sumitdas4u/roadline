<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
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

        $page_title = 'Password Change';
        $page_description = 'Use strong password ';
        return view('auth.passwords.change', compact('page_title', 'page_description'));


      //return view('changePassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:8'],
            'new_confirm_password' => ['same:new_password'],

        ]);

        User::find(auth()->user()->id)->update([
            'password'=> Hash::make($request->new_password),
            'password_change_at'=> Carbon::now(),
            'email_verified_at'=> Carbon::now()
        ]);
        return redirect()->route('change.password')->with('status', 'password succesfully changed');

    }
}
