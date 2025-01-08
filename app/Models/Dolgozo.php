<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolgozo extends Model
{
    
    use HasFactory;

    protected $table = 'dolgozok';
    protected $primaryKey = 'DolgozoID';
    protected $fillable = ['Nev', 'Email', 'Telefonszam', 'Munkakor'];
    public $timestamps = false;

}

class DolgozokReszlet extends Model
{
    
    use HasFactory;

    protected $table = 'dolgozokreszletek';
    protected $primaryKey = 'ReszletID';
    protected $fillable = ['Cim', 'SzuletesiDatum', 'Bankszamlaszam'];
    public $timestamps = false;

}