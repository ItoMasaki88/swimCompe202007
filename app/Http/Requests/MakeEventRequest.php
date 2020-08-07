<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MakeEventRequest extends FormRequest
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
            'style' => ['integer', 'min:1', 'max:5'],
            'age' => ['integer', 'min:1', 'max:6'],
            'distance' => ['integer', 'min:1', 'max:3'],
            'sex' => ['required', 'integer', 'min:1', 'max:3'],
            'playerType' => ['required', 'integer', 'min:0', 'max:1'],
            'races' => ['required', 'integer', 'min:1', 'max:20'],
            'date' => ['required', 'integer', 'min:1', 'max:10'],
            'hour' => ['required', 'integer', 'min:7', 'max:22'],
            'minute' => ['required', 'integer', 'min:0', 'max:60'],
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'style.*' => ':attributeは必ず選択してください。',
            'age.*' => ':attributeは必ず選択してください。',
            'distance.*' => ':attributeは必ず選択してください。',
            'sex.*' => ':attributeは必ず選択してください。',
            'playerType.*' => ':attributeは必ず選択してください。',

            'races.required' => ':attributeは必ず入力してください。',
            'races.integer' => ':attributeは1から20の整数を入力してください。',
            'races.min' => ':attributeは1から20の整数を入力してください。',
            'races.max' => ':attributeは1から20の整数を入力してください。',

            'date.required' => ':attributeは必ず入力してください。',
            'date.integer' => ':attributeは1から10の整数を入力してください。',
            'date.min' => ':attributeは1から10の整数を入力してください。',
            'date.max' => ':attributeは1から10の整数を入力してください。',

            'hour.required' => ':attributeは必ず入力してください。',
            'hour.integer' => ':attributeは7時から22時を指定してください。',
            'hour.min' => ':attributeは7時から22時を指定してください。',
            'hour.max' => ':attributeは7時から22時を指定してください。',

            'minute.required' => ':attributeは必ず入力してください。',
            'minute.integer' => ':attributeは0から60分を指定してください。',
            'minute.min' => ':attributeは0から60分を指定してください。',
            'minute.max' => ':attributeは0から60分を指定してください。',
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
            'style' => '泳法',
            'age' => '年齢区分',
            'distance' => '距離',
            'sex' => '性別',
            'playerType' => '出場形態',
            'races' => 'レース数',
            'date' => '開始日',
            'hour' => '開始時間',
            'minute' => '開始時間（分）',
        ];
    }
}
