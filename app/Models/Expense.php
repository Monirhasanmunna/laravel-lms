<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id =  Helper::getInstituteId();
            $item->institute_branch_id = Helper::getBranchId();
        });
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}