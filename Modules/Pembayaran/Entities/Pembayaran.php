<?php

namespace Modules\Pembayaran\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = ['id_pembayaran'];
    // protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Pembayaran\Database\factories\PembayaranFactory::new();
    }
}
