<?php


namespace App\Traits\Api\Auth;


use App\Models\Device;

trait StoreDeviceToken
{
    protected function storeUserDevice($deviceToken)
    {
        if ($deviceToken) {
            $device = new Device;
            $device->token = $deviceToken;
            $device->user_id = auth()->id();
            $device->save();
        }
    }
}
