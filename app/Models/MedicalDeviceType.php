<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class MedicalDeviceType extends Model
{
    //
    use DefaultDatetimeFormat;
    use ModelTree;
    //table name
    protected $table = 'medical_device_types';

    public function getList()
    {
        return $this->get();
    }
}
