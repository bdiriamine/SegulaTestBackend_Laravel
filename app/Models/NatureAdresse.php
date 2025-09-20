<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureAdresse extends Model
{
    use HasFactory;
    protected $table      = 'nature_adresses';
    protected $primaryKey = 'code_nature';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'code_nature',
        'libelle_nature',
    ];
    public function adresses()
    {
        return $this->hasMany(Adresse::class, 'code_nature', 'code_nature');
    }
}
