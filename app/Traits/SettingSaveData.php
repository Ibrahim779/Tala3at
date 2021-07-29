<?php


namespace App\Traits\SaveData;


trait SettingSaveData
{
    /**
     * @param $setting
     * @return mixed
     */
    private function validation($setting)
    {
        if ($setting->type){
            return request()->validate([
                'name' => 'required|min:3|max:191',
                'image' =>'image|mimes:jpeg,jpg,png,gif,svg|max:10000'
            ]);
        }else{
            return request()->validate([
                'name' => 'required|min:3|max:191',
                'key' => 'required|min:3|max:191',
                'type' => 'required',
            ]);
        }
    }
    private function saveData($setting)
    {
        $this->validation($setting);
        $setting->name = request()->name;
        $setting->key = request()->key?:$setting->key;
        $setting->type = request()->type?:$setting->type;
        if (request()->value_en)
        {
            $setting->value_en = request()->value_en;
        }
        if (request()->value_ar)
        {
            $setting->value_ar = request()->value_ar;
        }
        if (request()->img)
        {
            $setting->img = request()->img;
        }
        $setting->save();
    }
}
