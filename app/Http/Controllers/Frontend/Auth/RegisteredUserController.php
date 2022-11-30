<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Frontend\Auth\RegisterRequest;

class RegisteredUserController extends Controller
{
	/**
	 * @var string
	 * Return the model
	 */
	public function __construct()
	{
		$this->model = config('model-variables.models.user.class');
	}

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Frontend.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $latestUserId = $this->model::orderBy('user_id', 'DESC')->value('user_id');

        $user = $this->model::create([
            'user_id' => ++$latestUserId,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob
        ]);
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
