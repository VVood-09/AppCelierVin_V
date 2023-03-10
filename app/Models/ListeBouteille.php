<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeBouteille extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bouteille_id',
        'cellier_id',
        'qte'
    ];

    public function bouteilles()
    {
        return $this->belongsTo(Cellier::class);
    }
}
