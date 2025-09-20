<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieAdresse extends Model
{
    use HasFactory;

    protected $table      = 'categorie_adresses';
    protected $primaryKey = 'code_categorie';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'code_categorie',
        'libelle_categorie',
    ];

    public function adresses()
    {
        return $this->hasMany(Adresse::class, 'code_categorie', 'code_categorie');
    }
}
