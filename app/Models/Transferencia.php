<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;
    protected $table = 'transferencias';

    protected $fillable = [
        'fecha',
        'monto',
        'observacion',
        'cuenta_destino',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
