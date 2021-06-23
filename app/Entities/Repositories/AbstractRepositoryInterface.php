<?php
namespace App\Entities\Repositories;

/**
 * Interface AbstractRepositoryInterface
 *
 * @package App\Entities\Repositories
 */
interface AbstractRepositoryInterface
{
    /**
     * Find a model by its primary key.
     *
     * @param mixed $id
     * @param array $columns
     *
     * @return AbstractModel|Collection|static[]|static|null
     */
    public function findById($id, array $columns = ['*']);

    /**
     * Save a new model and return the instance.
     *
     * @param  array $attributes
     *
     * @return static
     */
    public function create(array $attributes);


    /**
     * Save multiple model.
     *
     * @param  array $attributes
     *
     * @return static
     */
    public function insert(array $attributes);

    /**
     * Save model and return the instance.
     *
     * @param  int   $id
     * @param  array $attributes
     *
     * @return boolean
     */
    public function update($id, array $attributes);

    /**
     * Delete model and return the instance.
     *
     * @param  int $id
     *
     * @return boolean
     * @throws \Exception
     */
    public function delete($id);

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function deleteBy($field, $value);

    /**
     * Delete model and return the instance.
     *
     * @param  array $ids
     *
     * @return boolean
     * @throws \Exception
     */
    public function deleteByListId($ids);

    /**
     * Get all items
     *
     * @param array $columns
     *
     * @return AbstractModel[]|Collection|static[]
     */
    public function getAll($columns = ['*']);

    /**
     * Start a new database transaction.
     *
     * @return void
     */
    public function beginTransaction();

    /**
     * Commit the active database transaction.
     *
     * @return void
     */
    public function commit();

    /**
     * Rollback the active database transaction.
     *
     * @return void
     */
    public function rollback();
}
