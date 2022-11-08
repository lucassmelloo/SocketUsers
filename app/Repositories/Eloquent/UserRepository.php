<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    protected $model = User::class;

    public function all()
    {
        return $this->model->all();
    }

    public function actives()
    {
        return $this->model->where('is_active',1)->get();
    }

    public function inactives()
    {
        return $this->model->where('is_active',0)->get();
    }

    public function inactivateUser(User $user)
    {
        $user->is_active = 0;
        $user->save();
    }
}