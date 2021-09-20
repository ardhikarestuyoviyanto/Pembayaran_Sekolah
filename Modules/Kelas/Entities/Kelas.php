<?php

namespace Modules\Kelas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Siswa\Entities\Siswa;

class Kelas extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'tb_kelas';
    protected $primaryKey = 'id_kelas';
    protected $guarded = ['id_kelas'];
    // protected $fillable = ['nama_kelas'];

    // protected static function newFactory()
    // {
    //     return \Modules\Kelas\Database\factories\KelasFactory::new();
    // }

    public function tb_siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
