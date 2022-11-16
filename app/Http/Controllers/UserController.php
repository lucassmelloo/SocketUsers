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
        $userList = $repository->all();
        return Inertia::render('Home',['userList'=>$userList]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
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

    public function inactivateUser(UserRepository $repository)
    {   
        $repository->inactivateUser();
        return 'OK';
    }

    public function activateUser(UserRepository $repository)
    {
        $repository->activateUser();
        return 'OK';
    }
}
