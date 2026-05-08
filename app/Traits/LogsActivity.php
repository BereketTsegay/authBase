<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function (Model $model) {
            $model->logActivity('created', $model->toArray());
        });

        static::updated(function (Model $model) {
            $model->logActivity('updated', [
                'old' => $model->getOriginal(),
                'new' => $model->getChanges()
            ]);
        });

        static::deleted(function (Model $model) {
            $model->logActivity('deleted', $model->toArray());
        });
    }

    protected function logActivity(string $event, array $properties = [])
    {
        ActivityLog::create([
            'log_name' => $this->getTable(),
            'description' => "{$event} " . class_basename($this),
            'subject_type' => get_class($this),
            'subject_id' => $this->id,
            'causer_type' => auth()->user() ? get_class(auth()->user()) : null,
            'causer_id' => auth()->id(),
            'properties' => $properties,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}