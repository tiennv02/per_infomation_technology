<?php namespace App\Http\Requests;

use Illuminate\Http\Request;

class ContactsRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'email' => 'required|email|max:256',
            'phone' => 'required|phone|max:25',
            'content' => 'required|max:1000'
        ];
    }

}
