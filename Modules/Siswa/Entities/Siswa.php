<?php

namespace Modules\Siswa\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Kelas\Entities\Kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'tb_siswa';
    protected $primaryKey = 'id_siswa';
    protected $guarded = 'id_siswa';
    protected $foreignKey = 'id_kelas';

    public function tb_kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    // protected $fillable = [];
    // protected static function newFactory()
    // {
    //     return \Modules\Siswa\Database\factories\SiswaFactory::new();
    // }
}
