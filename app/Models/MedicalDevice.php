<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class MedicalDevice extends Model
{
    use DefaultDatetimeFormat;
    //table name
    protected $table = 'medical_devices';

    public function MedicalDeviceType()
    {
        return $this->hasOne(MedicalDeviceType::class, 'id', 'type_id');
    }
    public function getRecommended()
    {
        return $this->where(['is_recommend' => 1])->orderBy('id', 'DESC')->limit(3)->get();
    }
    public function getPopularMedicalDevice()
    {
        return $this->where(['type_id' => 2])->orderBy('id', 'DESC')->limit(3)->get();
    }
    public function getUnRecommended()
    {
        return $this->where(['is_recommend' => 0])->orderBy('id', 'DESC')->limit(3)->get();
    }

    public function getRecent()
    {
        return $this->limit(5)->orderBy('id', 'DESC')->get();
    }
}
