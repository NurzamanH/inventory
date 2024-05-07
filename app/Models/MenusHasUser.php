<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusHasUser extends Model
{
    use HasFactory;

    protected $table = 'menus_has_user';

    public function hasMenu()
    {
        return $this->belongsTo(Menus::class, 'menu_id', 'id');
    }
}
