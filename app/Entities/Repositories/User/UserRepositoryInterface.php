<?php

namespace App\Entities\Repositories\User;

use App\Entities\Repositories\AbstractRepositoryInterface;

interface UserRepositoryInterface extends AbstractRepositoryInterface
{
    public function getAllUser();
}
