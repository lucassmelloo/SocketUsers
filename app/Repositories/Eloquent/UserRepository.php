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

    public function findById($id)
    {
        return $this->users->where('id',$id)->first();
    }

    public function createOrEdit(array $data)
    {
        $user = $this->findById(data_get($data, 'id'));
 
        if ($user !== null) {
            $user->update($data);
            $user->save();
        } else {
            $user = new User();
            $user->fill($data);
            $user->save();
        }
        return $user;
    }

    public function filterUsers(?array $filters)
    {
        //dd(data_get($filters,'is_active'),!isset($filters['is_active'] ));
        $filteredUsers = 
            $this->users
                ->when(data_get($filters,'name'), 
                    function($builder) use ($filters) {
                        $builder->where('name','LIKE','%'.$filters['name'].'%');
                    }
                )
                ->when(data_get($filters,'email'), 
                    function($builder) use ($filters) {
                        $builder->where('email','LIKE','%'.$filters['email'].'%');
                    }
                )
                ->when(!is_null(data_get($filters,'is_active')), 
                    function($builder) use ($filters) {
                        $builder->where('is_active', $filters['is_active']);
                    }
                )
                ->paginate(10);
            dd($filteredUsers);
        return response()->json($filteredUsers);
    }

}