<?php


namespace App\Services\Permission;


use Spatie\Permission\Models\Permission;

class GeneratePermissions
{
    public static function generatePermissions()
    {
        foreach (self::getModels() as $model){
            self::generateFor($model);
        }
    }
    protected static function generateFor($model)
    {
        $guard = 'admin';
        Permission::firstOrCreate(['name' => 'browse '.$model, 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'edit '.$model, 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'add '.$model, 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'delete '.$model, 'guard_name' => $guard]);
    }
    protected static function getModels()
    {
        $path = app_path() . "/Models";
        $models = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '/' . $result;
            if (is_dir($filename)) {
                $models = array_merge($models, getModels($filename));
            }else{
                $models[] = substr($filename,0,-4);
            }
        }

        $models = array_map(function ($model){
           $arr = explode('Models/',$model);
           return strtolower(end($arr));
        }, $models);
        $models = array_diff($models, ['adminmessage']);
        $arr = ['role'];
        $models = array_merge($models, $arr);
        return $models;
    }
}
