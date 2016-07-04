<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            'phone' => 'required|max:25|regex:/(01)[0-9]{9}/',
            'content' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được để trống',
            'name.max' => 'Họ và tên không được quá 256 kí tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được quá 256 kí tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được quá 25 kí tự',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'content.required' => 'Nội dung không được để trống',
            'content.max' => 'Nội dung không được quá 1000 kí tự',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
