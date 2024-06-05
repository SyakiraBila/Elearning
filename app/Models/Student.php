<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'Students';
    protected $fillable = ['name', 'nim', 'major', 'class', 'courses_id'];

    /**
     * ===================================
     * Laravel Relationship method:
     * ===================================
     * 1.0ne to one
     * -hasOne()        = untuk meminjamkan id ketable lain
     * -belongsTo()     = untuk meminjam id dari table lain
     * 
     * 2. One to many/ I Many One
     * -hasOne()        = untuk meminjamkan id ketable lain
     * -belongsToMany() = untuk meminjam id dari table lain
     */
    public function course(){
        return $this->belongsTo(Course::class, 'courses_id');
    }
}
