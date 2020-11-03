<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandModels extends Model
{
    protected $table = 'commands';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'device', 'command'];

    public function user()
    {
        return $this->belongsTo(UserModels::class, 'id', 'id');
    }
}
