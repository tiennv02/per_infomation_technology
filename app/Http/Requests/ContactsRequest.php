<?php namespace App\Http\Requests;

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
            'title' => 'required|max:256',
            'email' => 'required|email|max:256',
            'phone' => 'required|phone|max:25',
            'content' => 'required|max:1000',
            'type' => 'required|max:10'
        ];
    }

}
