<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  protected $table = 'notes';
  protected $fillable = ['id_user','judul', 'deskripsi'];

  // public $timestamps = false;
}
