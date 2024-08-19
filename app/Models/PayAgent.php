<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayAgent extends Model
{
    use HasFactory;

    protected  $fillable = ['id', 'rcl_agent_id', 'name', 'created_at', 'updated_at'];
}
