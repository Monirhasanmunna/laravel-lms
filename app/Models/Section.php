<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Section extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    protected static function booted()
    {
    //    static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id = Helper::getInstituteId();
            $item->institute_branch_id = Helper::getBranchId();
        });
    }

    public function class(){
        return $this->belongsTo(InsClass::class,'ins_class_id','id');
    }

    public function shift(){
        return $this->belongsTo(Shift::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function groups(){

        return $this->hasMany(Group::class);
    }

    public function students(){

        return $this->hasMany(Student::class);
    }
}
