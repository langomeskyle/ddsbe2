<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class User extends Model{
public $timestamps = false;

protected $primaryKey = 'studid';

protected $table = 'tblstudent';
// column sa table
protected $fillable = [
'studid', 'lastname','firstname','middlename','bday','age'
];}


