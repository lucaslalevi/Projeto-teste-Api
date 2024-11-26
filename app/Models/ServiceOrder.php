<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table = 'service_orders';

    // Desativa os timestamps
    public $timestamps = false;

    // Campos que podem ser preenchidos diretamente
    protected $fillable = [
        'vehiclePlate',
        'entryDateTime',
        'exitDateTime',
        'priceType',
        'price',
        'userId',
    ];

  

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
