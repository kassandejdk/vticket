<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table='tickets';
    protected $fillable = [
        'numeroTicket',
        'dateCreation',
        'estValide',
        'user_id',
        'ordrePassage',
       'service_id',
       'entreprise_id'
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }
    public static function pasTraiter($id){
        return self::where('estValide',false)
            ->whereHas('service' , function($query) use ($id){
                $query->where('entreprise_id', $id );
            })
            ->with('service')
            ->get();
    }
    
}
