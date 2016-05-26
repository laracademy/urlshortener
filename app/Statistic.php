<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    /**
     * fillable fields
     */
    protected $fillable = [
        'link_id',
        'referral'
    ];

    public function __construct()
    {
        $this->referral = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    }
}
