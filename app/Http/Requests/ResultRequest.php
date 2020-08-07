<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return Auth::user()->admin == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'entryIds' => ['required', 'array',],
            'entryIds.*' => ['required', 'integer', 'min:1',],
            'mins' => ['nullable', 'array',],
            'mins.*' => ['nullable', 'numeric', 'min:0', 'max:30',],
            'secs' => ['nullable', 'array',],
            'secs.*' => ['nullable', 'numeric', 'min:0', 'max:1800',],
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
        ];
    }

    /**
     * 項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'mins.*' => '結果タイム（分）',
            'secs.*' => '結果タイム（秒）',
        ];
    }
}
