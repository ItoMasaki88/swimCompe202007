<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditScheduleRequest extends FormRequest
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
            'dates' => ['required', 'array'],
            'dates.*' => ['required', 'integer', 'min:1', 'max:10'],
            'hours' => ['required', 'array'],
            'hours.*' => ['required', 'integer', 'min:7', 'max:22'],
            'minutes' => ['required', 'array'],
            'minutes.*' => ['required', 'integer', 'min:0', 'max:60'],
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'dates.*.required' => ':attributeは必ず入力してください。',
            'dates.*.integer' => ':attributeは1から10の整数を入力してください。',
            'dates.*.min' => ':attributeは1から10の整数を入力してください。',
            'dates.*.max' => ':attributeは1から10の整数を入力してください。',

            'hours.*.required' => ':attributeは必ず入力してください。',
            'hours.*.integer' => ':attributeは7時から22時を指定してください。',
            'hours.*.min' => ':attributeは7時から22時を指定してください。',
            'hours.*.max' => ':attributeは7時から22時を指定してください。',

            'minutes.*.required' => ':attributeは必ず入力してください。',
            'minutes.*.integer' => ':attributeは0から60分を指定してください。',
            'minutes.*.min' => ':attributeは0から60分を指定してください。',
            'minutes.*.max' => ':attributeは0から60分を指定してください。',
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
            'dates.*' => '開始日',
            'hours.*' => '開始時間',
            'minutes.*' => '開始時間（分）',
        ];
    }
}
