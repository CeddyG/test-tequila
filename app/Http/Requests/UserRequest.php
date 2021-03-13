<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\GeoApi;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
    * Get custom attributes for validator errors.
    *
    * @return array
    */
   public function attributes()
   {
       return [
            'name'          => 'nom',
            'postal_code'   => 'code postal'
       ];
   }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_user'       => 'numeric',
            'name'          => 'string|max:255',
            'postal_code'   => ['numeric', new GeoApi]
        ];
    }
}
