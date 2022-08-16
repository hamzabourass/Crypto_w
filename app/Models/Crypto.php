<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'stock',


    ];







    /*
    public function favorite(){
        $cid=auth()->guard('user')->user()!=null ? auth()->guard('user')->user()->id : null ;
        return $this->belongsTo(UserCryptoFavorite::class,'id','crypto_id')->where('user_id',$cid);
    }
    public function like(){
        $cid=auth()->guard('user')->user()!=null ? auth()->guard('user')->user()->id : null ;


        return $this->favorite()->selectRaw('crypto_id, count(*) as count')->groupBy('crypto_id');
    }
*/
}
