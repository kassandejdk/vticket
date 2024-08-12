<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table='services';
    protected $fillable = [
        'libelle',
        'entreprise_id'
       
    ];
    public function entreprise(){
        return $this->belongsTo(Entreprise::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
