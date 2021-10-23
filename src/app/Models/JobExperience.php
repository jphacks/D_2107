<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobExperience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'work_start_date',
        'work_end_date',
        'master_occupation_id',
        'master_business_id',
    ];

    /**
     * hidden対象カラム
     *
     * @var array
     */
    protected $hidden = [
    ];

    // 更新対象カラム
    public $dates = [
    ];

    /**
     * 職種リレーション
     *
     * @return void
     */
    public function occupation()
    {
        return $this->belongsTo(MasterOccupation::class, 'master_occupation_id')->withDefault();
    }

    /**
     * 業種リレーション
     *
     * @return void
     */
    public function business()
    {
        return $this->belongsTo(MasterBusiness::class, 'master_business_id')->withDefault();
    }
}
