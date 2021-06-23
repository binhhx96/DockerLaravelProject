<?php

namespace App\Entities\Repositories\User;

use App\Entities\Models\User;
use App\Entities\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository implements UserRepositoryInterface {
    /**
     * @var User
     */
    protected $model;

    /**
     * UserRepositoryInterface constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUser()
    {
        return $this->model->all();
    }
}
