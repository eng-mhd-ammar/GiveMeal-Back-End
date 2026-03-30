<?php

namespace Modules\Core\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CRUDObserver
{
    protected function logAction(string $action, Model $model): void
    {
        // $channelName = property_exists($model, 'logChannel') && !empty($model->logChannel)
        //     ? $model->logChannel
        //     : 'default';

        // $parts = explode('\\', $model::class);
        // $folder = $parts[1] ?? 'models';

        // $logPath = storage_path("logs/{$folder}");
        // if (!is_dir($logPath)) {
        //     mkdir($logPath, 0755, true);
        // }

        // $logger = Log::build([
        //     'driver' => 'single',
        //     'path'   => "{$logPath}/{$channelName}.log",
        //     'level'  => 'info',
        // ]);

        // $modelName = class_basename($model);

        // $logger->info("{$modelName} {$action}: ", $model->toArray());
    }

    public function retrieved(Model $model): void
    {
        $this->logAction('retrieved', $model);
    }

    // CRUD Actions =====================================================

    public function creating(Model $model): void
    {
        $this->logAction('creating', $model);
    }

    public function created(Model $model): void
    {
        $this->logAction('created', $model);
    }

    public function updating(Model $model): void
    {
        $this->logAction('updating', $model);
    }

    public function updated(Model $model): void
    {
        $this->logAction('updated', $model);
    }

    public function saving(Model $model): void
    {
        $this->logAction('saving', $model);
    }

    public function saved(Model $model): void
    {
        $this->logAction('saved', $model);
    }

    public function deleting(Model $model): void
    {
        $this->logAction('deleting', $model);
    }

    public function deleted(Model $model): void
    {
        $this->logAction('deleted', $model);
    }

    public function restoring(Model $model): void
    {
        $this->logAction('restoring', $model);
    }

    public function restored(Model $model): void
    {
        $this->logAction('restored', $model);
    }

    public function forceDeleted(Model $model): void
    {
        $this->logAction('force deleted', $model);
    }

    // Pivot Relations =====================================================

    public function attached($relation, $parent, $ids, $attributes): void
    {
        $this->logAction("attached to {$relation}", $parent);
    }

    public function detached($relation, $parent, $ids): void
    {
        $this->logAction("detached from {$relation}", $parent);
    }

    public function synced($relation, $parent, $changes): void
    {
        $this->logAction("synced {$relation}", $parent);
    }
}
