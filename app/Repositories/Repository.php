<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    const PAGINATION = 5;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getWithPagination($count = null)
    {
        return $this->model->paginate($count ?: self::PAGINATION);
    }

    public function createOrUpdate(Model $model, $request)
    {
        $this->saveData($model, $request);
    }

    public function delete(Model $model)
    {
        if (isset($model->img)) {
            if (Storage::disk('public')->exists($model->img)) {
                Storage::disk('public')->delete($model->img);
            }
        }
        $model->delete();
    }

    public abstract function saveData($model, $request);
}
