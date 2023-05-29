<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    public function workshops() {
        return $this->hasMany(Workshop::class,'id','parent_id');
    }

    public static function getMenuItems() {
        return self::with('children')->whereNull('parent_id')->get();
    }

    public function children() {
        return $this->hasMany(MenuItem::class, 'parent_id')->with('children');
    }

}
