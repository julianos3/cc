<?php

namespace CentralCondo\Repositories\Portal;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\UsersCondominiumRepository;
use CentralCondo\Entities\Portal\UsersCondominium;
use CentralCondo\Validators\Portal\UsersCondominiumValidator;

/**
 * Class UsersCondominiumRepositoryEloquent
 * @package namespace CentralCondo\Repositories;
 */
class UsersCondominiumRepositoryEloquent extends BaseRepository implements UsersCondominiumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UsersCondominium::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UsersCondominiumValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
