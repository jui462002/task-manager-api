<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Only admins can create tasks
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'status' => 'required|in:TODO,IN_PROGRESS,DONE,OVERDUE',
            'priority' => 'required|in:LOW,MEDIUM,HIGH',
            'due_date' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
