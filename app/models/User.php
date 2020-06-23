<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'users';
    protected $fillable = [
        'name','avatar','email','role','password'
    ];
    public function getCateName(){
        return $this->hasOne(Role::class,'id','role');
    }
}
?>