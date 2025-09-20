<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $table      = 'adresses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description_adresse',
        'gps_latitude',
        'gps_longitude',
        'gps_altitude',
        'code_nature',
        'code_categorie',
    ];

    public function nature()
    {
        return $this->belongsTo(NatureAdresse::class, 'code_nature', 'code_nature');
    }

    public function categorie()
    {
        return $this->belongsTo(CategorieAdresse::class, 'code_categorie', 'code_categorie');
    }
}
