<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = 'products';
    protected $fillable = [
        'name','image','cate_id','price','short_desc','detail','star'
    ];
    
    public function getCateName(){
        return $this->hasOne(Category::class,'id','cate_id');
    }
}


?>