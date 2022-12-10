<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tb_level";

    protected $fillable = [
      'level',
      'deskripsi',
    ];
  
    protected $hidden = [
      'created_at',
      'updated_at',
      'deleted_at',
    ];

}
