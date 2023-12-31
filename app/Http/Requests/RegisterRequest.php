<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

  public function authorize(): bool
  {
    return (auth()->guest());
  }

  public function rules(): array
  {
    return [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:3'
    ];
  }
}
