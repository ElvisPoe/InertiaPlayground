<?php

use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware('auth')->group(function() {

    Route::get('/', function () {
        return Inertia::render('Home', [
            'date' => date("Y-m-d H:i:s")
        ]);
    });

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user),
                        'delete' => Auth::user()->can('delete', $user)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create','App\Models\User');

    Route::post('/users', function () {
        $attrs = Request::validate([
            'name' => 'required',
            'email' => ['email', 'required'],
            'password' => 'required',
        ]);

        User::create($attrs);

        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
