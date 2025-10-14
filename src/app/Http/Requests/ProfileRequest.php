<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!$this->input('action')) {
            return [
                'image' => ['file', 'mimes:jpeg,png'],
            ];
        }

        if ($this->input('action')) {
            if ($this->input('image')) {
                return [
                    'image' => ['regex:/\.(jpeg|png)$/i'],
                ];
            }
            return [
                'name' => ['required', 'max:20'],
                'postal_code' => ['required', 'regex:/^\d{3}-\d{4}$/'],
                'address' => ['required'],
            ];
        }
    }

    public function messages()
    {
        return [
            'image.file' => '画像はファイルを指定してください',
            'image.mimes' => '画像の拡張子は.jpegまたは.pngを指定してください',
            'image.regex' => '画像の拡張子は.jpegまたは.pngを指定してください',
            'postal_code.regex' => '郵便番号は「123-4567」の形式で入力してください'
        ];
    }
}
