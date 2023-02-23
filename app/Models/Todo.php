<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'tag_id',
    ];

    //protected $guarded = ['id'];
    

    public function getDetail()
    {
        $txt = $this->name_id . 'でログイン';
        return $txt;
    }
}
