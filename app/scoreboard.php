<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scoreboard extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id';
    protected $table ='scoreboard'; 
    protected $fillable = [
        'score_home', 'score_away','musik','menit','detik','name_home','name_away'
    ];
}
