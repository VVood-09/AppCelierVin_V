<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'image',
        'code_saq',
        'pays',
        'description',
        'prix',
        'url_saq',
        'format',
        'type',
    ];

     public function infos()
    {
        return $this->hasOne(Bouteille::class);
    }

}
