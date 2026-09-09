<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\WithCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['project_id', 'title', 'description', 'priority', 'status', 'deadline', 'created_by'])]
#[WithCast('deadline', 'datetime')]
class Task extends Model
{
    use HasFactory;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_assignees')
            ->withPivot('assigned_at');
    }

        /**
     * Scope: filter berdasarkan status.
     */
    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope: filter berdasarkan priority.
     */
    public function scopePriority($query, string $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Scope: urutkan berdasarkan deadline terdekat.
     */
    public function scopeOrderByDeadline($query, string $direction = 'asc')
    {
        return $query->orderBy('deadline', $direction);
    }

    /**
     * Hitung progress suatu project berdasarkan task yang statusnya COMPLETED.
     */
    public static function calculateProgress(int $projectId): float
    {
        $total = static::where('project_id', $projectId)->count();

        if ($total === 0) {
            return 0;
        }

        $completed = static::where('project_id', $projectId)
            ->where('status', 'COMPLETED')
            ->count();

        return round(($completed / $total) * 100, 2);
    }
}
