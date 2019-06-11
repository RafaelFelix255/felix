<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;


class Historic extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'total_before',
        'total_after',
        'user_id_transaction',
        'date'
    ];
    public function type($type = null){
        $types = [
            'I' => 'Crédito',
            'O' => 'Débito',
            'T' => 'Débito Transf.',
        ];

        if (!$type){
            return $types;
        } else {
            if ($this->user_id_transaction != null && $type === 'I'){
                return 'Crédito Transf.';
            } else {
                return $types[$type];
            }            
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userSender(){
        return $this->belongsTo(User::class, 'user_id_transaction');
    }

    public function getDateAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}
