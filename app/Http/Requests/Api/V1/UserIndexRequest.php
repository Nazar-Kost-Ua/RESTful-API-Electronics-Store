<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UserIndexRequest extends FormRequest
{
    protected ?array $allowedIncludes;
    protected ?array $allowedFields;

    protected ?int $maxPerPage;

    public function __construct()
    {
        parent::__construct();
        $this->allowedIncludes = config('data.allowed_includes.users.index') ?? [];
        $this->allowedFields = config('data.allowed_fields.users.index') ?? [];
        $this->maxPerPage = config('data.max_per_page');
    }

    public function checkIncludes($attribute, $value, $fail): void
    {
        $includes = explode(',', $value);
        foreach ($includes as $include) {
            if (!in_array($include, $this->allowedIncludes)) {
                $fail("The selected include '{$include}' is invalid.");
            }
        }
    }

    public function checkFields($attribute, $value, $fail): void
    {
        $key = str_replace('fields.', '', $attribute);
        $fields = array_map('trim', explode(',', $value));

        if (array_key_exists($key, $this->allowedFields)) {
            foreach ($fields as $field) {
                if (!in_array($field, $this->allowedFields[$key])) {
                    $fail("The selected field '{$field}' for '{$key}' is invalid.");
                }
            }
        } else {
            $fail("Key '{$key}' is not valid for fields.");
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'page' => ['nullable', 'integer', 'min:1'],
            'per_page' => ['nullable', 'integer', 'min:1', 'multiple_of:5', "max:{$this->maxPerPage}"],
            'include' => ['nullable', 'string', function ($attribute, $value, $fail) {
                $this->checkIncludes($attribute, $value, $fail);
            }],
            'fields' => ['nullable', 'array'],
            'fields.*' => ['string', 'distinct', function ($attribute, $value, $fail) {
                $this->checkFields($attribute, $value, $fail);
            }],
        ];
    }
}
