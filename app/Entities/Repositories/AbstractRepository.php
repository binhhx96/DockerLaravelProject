<?php

namespace App\Entities\Repositories;

use App\Entities\Models\AbstractModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class AbstractRepository
 *
 * @package App\Entities\Repositories
 */
abstract class AbstractRepository implements AbstractRepositoryInterface
{
    /**
     * @var AbstractModel
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     *
     * @param AbstractModel $model
     */
    public function __construct(AbstractModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param AbstractModel $model
     */
    protected function setModel(AbstractModel $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritdoc
     */
    public function findById($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    /**
     * @inheritdoc
     */
    public function create(array $attributes)
    {
        $attributes = $this->convertDatetime($attributes);
        if ($this->model->timestamps) {
            $now = $this->convertTimezoneDefault(Carbon::now());
            $attributes['created_at'] = $now;
            $attributes['updated_at'] = $now;
        }

        return $this->model->create($attributes);
    }

    /**
     * @inheritdoc
     */
    public function insert(array $attributes)
    {
        return $this->model->insert($attributes);
    }

    /**
     * @inheritdoc
     */
    public function update($id, array $attributes)
    {
        $attributes = $this->convertDatetime($attributes);
        if ($this->model->timestamps) {
            $attributes['updated_at'] = $this->convertTimezoneDefault(Carbon::now());
        }

        return $this->model->where($this->model->getPrimaryKey(), $id)->update($attributes);
    }

    /**
     * @inheritdoc
     */
    public function delete($id)
    {
        return $this->model->where($this->model->getPrimaryKey(), $id)->delete();
    }

    /**
     * @inheritdoc
     */
    public function deleteByListId($ids)
    {
        return $this->model->whereIn($this->model->getPrimaryKey(), $ids)->delete();
    }

    /**
     * @inheritdoc
     */
    public function deleteBy($field, $value)
    {
        return $this->model->where($field, $value)->delete();
    }

    /**
     * @inheritdoc
     */
    public function getAll($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * @inheritdoc
     */
    public function beginTransaction()
    {
        DB::beginTransaction();
    }

    /**
     * @inheritdoc
     */
    public function commit()
    {
        DB::commit();
    }

    /**
     * @inheritdoc
     */
    public function rollback()
    {
        DB::rollBack();
    }
}
