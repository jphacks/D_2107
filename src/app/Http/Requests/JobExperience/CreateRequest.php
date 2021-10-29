<?php

namespace App\Http\Requests\JobExperience;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [    
            "jobTitle" => "仕事タイトル",
            "businessId" => "業種",
            "ocuppationId" => "職種",
            "workStartDate" => "勤務開始日",
            "workEndDate" => "勤務終了日",
        ];
    }

    public function rules()
    {
        return [
            "jobTitle" => ["required"],
            "businessId" => ["required"],
            "ocuppationId" => ["required"],
            "workStartDate" => ["required"],
            "workEndDate" => ["required"],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->workStartDate > $this->workEndDate) {
                $validator->errors()->add('workStartDate', '掲載開始日は掲載終了日の以前の日付を指定してください。');
            }
        });
    }
}
