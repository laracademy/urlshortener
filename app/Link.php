<?php

namespace App;

use App\Statistic;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * fillable fields
     */
    protected $fillable = [
        'name',
        'url',
        'slug'
    ];

    /**
     * relationships
     */
    public function statistics()
    {
        return $this->hasMany(\App\Statistic::class);
    }

    /**
     * helpers
     */
    public static function makeSlug($numberCharacters = 10, $preSlug = '', $maximumTries = 5)
    {
        $tries = 0;

        while($tries < $maximumTries) {
            // pre-set slug to anything that was passed in
            $slug = $preSlug;

            // if our preslug value is less than the number of characters
            if(strlen($slug) < $numberCharacters) {
                // append random characters on to the end
                $slug .= str_random(($numberCharacters - strlen($slug)));
            }

            if(! Link::slugExists($slug)) {
                // if our slug does not exists, exit loop
                break;
            }

            $tries ++;
        }

        // check to see if we reached our maximum tries
        if($tries >= $maximumTries) {
            throw new \Exception('Maximium tries reached for generating a slug');
        }

        return $slug;
    }

    public static function slugExists($slug)
    {
        // return true / false
        return Link::LoadBySlug($slug)->count() > 0;
    }

    public function addVisit()
    {
        $this->statistics()->save(new Statistic);
    }

    /**
     * Query Scopes
     */
    public function scopeLoadBySlug($query, $slug)
    {
        return $query->where('slug', trim($slug));
    }

    public function scopeLoadById($query, $id)
    {
        return $query->where('id', intval($id));
    }
}
