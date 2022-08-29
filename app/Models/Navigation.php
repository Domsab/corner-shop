<?php

namespace App\Models;

use App\Models\Departments;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigation';

    protected $fillable = ['label', 'department_id'];

    public function departments()
    {
        $this->hasOne(Departments::class);
    }
}
