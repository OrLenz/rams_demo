<?php

namespace App\Observers;

use App\Models\Warehouse;

class WarehouseObserver
{
    /**
     * Handle the Warehouse "created" event.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return void
     */
    public function created(Warehouse $warehouse)
    {
        // $warehouse = Warehouse::with('good_loan_rooms')->where('room_id', '=>', 'room_source')->get();

        // if ($warehouse && $warehouse->good_loan_rooms['status'] == 'DIPINJAM') {
        //     $warehouse->last_stock = $warehouse->stock - (int) $warehouse->good_loan_rooms->loan_stock;
        // } else {
        //     $warehouse->last_stock = $warehouse->stock;
        // }
    }

    /**
     * Handle the Warehouse "updated" event.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return void
     */
    public function updated(Warehouse $warehouse)
    {
        //
    }

    /**
     * Handle the Warehouse "deleted" event.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return void
     */
    public function deleted(Warehouse $warehouse)
    {
        //
    }

    /**
     * Handle the Warehouse "restored" event.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return void
     */
    public function restored(Warehouse $warehouse)
    {
        //
    }

    /**
     * Handle the Warehouse "force deleted" event.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return void
     */
    public function forceDeleted(Warehouse $warehouse)
    {
        //
    }
}
