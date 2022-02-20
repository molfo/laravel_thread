<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * ユーザーがメゾッドの実行権限を持っているか判定
     * @return bool
     */
    public function authorize()
    {
        // default:false フォームから値を渡す際にtureでないとUnauthenticateエラーを返す
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required',
        ];
    }

    /**
     * @Override
     * 勝手にリダイレクトさせない
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     */
    // protected function failedValidation(Validator $validator)
    // {
    // }

}
