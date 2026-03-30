<?php

namespace Modules\Core\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Core\Exceptions\ServiceException;

class BaseRelationService
{
    protected string $relation;
    protected string $model;

    public function __construct()
    {
        if (!(method_exists($this->model, $this->relation) && (new $this->model())->{$this->relation}() instanceof Relation)) {
            ServiceException::relationNotFound($this->relation);
        }
    }

    public function create(Model $model, array $values): void
    {
        $this->repository->create($model, $this->relation, $values);
    }
    public function createMany(Model $model, array $values): void
    {
        $this->repository->createMany($model, $this->relation, $values);
    }
    public function update(Model $model, $values): void
    {
        $this->repository->update($model, $this->relation, $values);
    }
    public function delete(Model $model, $values): void
    {
        $this->repository->delete($model, $this->relation, $values);
    }
    public function attach(Model $model, $values): void
    {
        $this->repository->attach($model, $this->relation, $values);
    }
    public function sync(Model $model, $values): void
    {
        $this->repository->sync($model, $this->relation, $values);
    }
    public function syncWithoutDetaching(Model $model, $values): void
    {
        $this->repository->syncWithoutDetaching($model, $this->relation, $values);
    }
    public function syncWithPivotValues(Model $model, $values): void
    {
        $this->repository->syncWithPivotValues($model, $this->relation, $values);
    }
    public function detach(Model $model, $values): void
    {
        $this->repository->detach($model, $this->relation, $values);
    }
}
