<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';


    protected $fillable = [
        'original_name',
        'name_on_server',
        'user_id',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }



}
