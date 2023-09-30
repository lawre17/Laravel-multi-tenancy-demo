<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $databaseManager = DB::connection();
        $databases = $databaseManager->select("show databases");
        return view('auth.register',compact('databases')); 
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tenant' => ['required', 'string', 'unique:'.Tenant::class.',id'],
        ]);

        $tenant = Tenant::create(
            ['id' => $request->tenant],
        );
        
        $tenant->domains()->create(['domain'=>$request->name.'.localhost']);

        if($tenant){
            return back()->with('status','Tenant Addedd successfully');
        }else{
             $errors = ['name' => [$tenant->errors()->getMessages()]];
            return back()->withErrors($errors);
        }

    }
}
