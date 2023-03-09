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
        'type',
        'format',
        'pays',
        'description',
        'prix_saq',
        'url_saq',
    ];
}
