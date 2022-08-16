<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCryptoFavorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'crypto_id',
        'user_id',
    ];


    public function crypto(){
        return $this->belongsTo(Crypto::class);
    }
}
