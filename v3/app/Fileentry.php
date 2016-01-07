<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
public function user()
    {
        return $this->belongsTo('App\User');
    }


public function human_filesize($dec = 2) { 
	$bytes = $this->size;
	$size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'); 
	$factor = floor((strlen($bytes) - 1) / 3); 
	return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) ." ". @$size[$factor]; 
}
}

