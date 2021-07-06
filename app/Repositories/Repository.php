<?php


namespace App\Repositories;


use App\Services\FileUpload\FileUploadService;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function update(Model $model, $request)
    {
        $model->update($request);
    }

    public function delete(Model $model)
    {
        if (isset($model->img)) {
            (new FileUploadService)->delete($model->img);
        }
        $model->delete();
    }

    public function __call($name, $arguments)
    {
        return $this->model->$name(...$arguments);
    }

}
