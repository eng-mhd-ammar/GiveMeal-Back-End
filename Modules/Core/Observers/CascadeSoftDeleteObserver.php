<?php

namespace Modules\Core\Observers;

use Illuminate\Database\Eloquent\Model;

class CascadeSoftDeleteObserver
{
    public function deleting(Model $model): void
    {
        if (property_exists($model, 'cascadeDeletes')) {
            foreach ($model->cascadeDeletes as $relation) {
                foreach ($model->$relation as $related) {
                    if (!is_null($related)) {
                        $related->delete();
                    }
                }
            }
        }
    }

    public function restoring(Model $model): void
    {
        if (request()->input('restore_cascade', 0) == 1) {
            if (property_exists($model, 'cascadeDeletes')) {
                foreach ($model->cascadeDeletes as $relation) {
                    $model->$relation()
                            ->onlyTrashed()
                            ->get()
                            ->each(function ($related): void {
                                if (!is_null($related)) {
                                    $related->restore();
                                }
                            });
                }
            }
        }
    }
}
