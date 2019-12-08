<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class Invitation extends Model
{
    protected $fillable = [
        'name', 'text', 'identifier', 'user_id',
    ];

    public function getLink() {
    	return route('invitation', $this);
    }

    public function getRouteKeyName()
	{
	    return 'identifier';
	}

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function createSlugFromName($name) {
        $slug = Str::limit(Str::slug($name), 40, '');
        $count = self::whereRaw("identifier RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

}
