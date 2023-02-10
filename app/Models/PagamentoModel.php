<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoModel extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';

    protected $fillable = [
        'id',
        'payload',
        'key_uuid',
        'response',
        'created_at',
        'updated_at'
    ];
}
