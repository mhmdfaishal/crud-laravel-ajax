<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusModel extends Model
{
    protected $table = 'campus';
    protected $guarded = [];
    protected $primaryKey = 'kodeuniv';
    public $incrementing = false;
}
