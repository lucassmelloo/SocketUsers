<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use App\Providers\EloquentServices\UserServiceProvider;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    
    public function index(UserRepository $repository)
    {
        $userList = $repository->filterUsers([]);
        return Inertia::render('Home',['userList'=>$userList])->with('message','Tudo certo na bahia');
    }

    public function getUsers(Request $request, UserRepository $repository)
    {
        $repositoryFilter = $request->only([
            'name',
            'email',
            'is_active'
        ]);
        return $repository->filterUsers($repositoryFilter);

    }

    public function show(User $user)
    {
        return Inertia::render('UserPage',['incomingUser'=>$user]);
    }

    public function store(Request $request, UserRepository $repository)
    {
        $user = $repository->createOrEdit($request->all());
        return redirect()->route('user-page',[$user->id])->with('message',"Success to update {$user->name} register");
    }
    public function create()
    {

    }

    public function edit(Request $request, UserRepository $id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

}
