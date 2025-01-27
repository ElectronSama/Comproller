<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolgozo extends Model
{
    
    use HasFactory;

    protected $table = 'nyilvantartas';
    protected $primaryKey = 'DolgozoID';
    protected $fillable = ['Vezeteknev', 'Keresztnev', 'Email', 'Telefonszam', 'Munkakor'];
    public $timestamps = false;

}