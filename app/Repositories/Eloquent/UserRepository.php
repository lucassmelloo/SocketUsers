<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

use function PHPUnit\Framework\isNull;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    private $users;

    public function __construct()
    {
        $this->users = resolve(User::class);
    }

    public function all()
    {
        return $this->users->all();
    }

    public function filterUsers(array $filters)
    {
        $filteredUsers = 
            $this->users
                ->when($filters['name'], 
                    function($builder) use ($filters) {
                        $builder->where('name','LIKE','%'.$filters['name'].'%');
                    }
                )
                ->when($filters['email'], 
                    function($builder) use ($filters) {
                        $builder->where('email','LIKE','%'.$filters['email'].'%');
                    }
                )
                ->when(!is_null($filters['is_active']), 
                    function($builder) use ($filters) {
                        $builder->where('is_active', $filters['is_active']);
                    }
                )
                ->get();
                
        return response()->json($filteredUsers);
    }

    public function actives()
    {
        return $this->users->where('is_active',1)->get();
    }

    public function inactives()
    {
        return $this->users->where('is_active',0)->get();
    }

    public function inactivateUser()
    {
        $this->users->is_active = 0;
        $this->users->save();
    }

    public function activateUser()
    {
        $this->users->is_active = 1;
        $this->users->save();
        // $user = $this->users->where('id',$id)->first();
        // $user->is_active = 1;
        // $user->save();
    }

}