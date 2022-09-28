<?php
  
namespace App\Models;
   
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
   
    protected $casts = [
        'additional' => 'collection'
    ];
    protected $fillable = [
        'name', 'price', 'description', 'image','size', 'wight'
    ];
}