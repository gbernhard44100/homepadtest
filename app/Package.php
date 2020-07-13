<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * Get all of the registrations for the package.
     */
    public function registrations()
    {
        return $this->hasMany('App\Registration');
    }
}
