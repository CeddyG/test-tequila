<?php

namespace App\Models;

use Phelium\Component\GeoApiFr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'postal_code'
    ];

    /**
     * Set the user's city.
     *
     * @param  string  $value
     * @return void
     */
    public function setCityAttribute($value)
    {
        $oGeoApi = new GeoApiFr();

        $aCity = $oGeoApi
            ->communes()
            ->fields(['nom'])
            ->search('codePostal', $this->attributes['postal_code']);
            
        $this->attributes['city'] = $aCity['datas'][0]['nom'];
    }
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->city = '';
        });
        
        static::updating(function ($query) {
            $query->city = '';
        });
    }
}
