<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use Phelium\Component\GeoApiFr;

class GeoApi implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $oGeoApi = new GeoApiFr();
        
        $aCity = $oGeoApi
            ->communes()
            ->fields(['nom'])
            ->search('codePostal', $value);
            
        return !empty($aCity['datas']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.geoapi');
    }
}
