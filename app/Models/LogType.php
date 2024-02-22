<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogType extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'log_type_name', 'log_type_icon', 'log_type_color'];
}
