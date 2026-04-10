<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $task = $this->route('task');
        $user = auth()->user();
        
        // Admin can update any task, user can only update their own
        return $user && ($user->role === 'admin' || $task->user_id === $user->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'status' => 'sometimes|in:TODO,IN_PROGRESS,DONE,OVERDUE',
            'priority' => 'sometimes|in:LOW,MEDIUM,HIGH',
            'due_date' => 'sometimes|date',
            'project_id' => 'sometimes|exists:projects,id',
            'user_id' => 'sometimes|exists:users,id',
        ];
    }
}
