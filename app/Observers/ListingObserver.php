<?php

namespace App\Observers;

use App\Models\Listing;
use App\Models\Verification;

use Illuminate\Support\Str;

class ListingObserver
{
    /**
     * Handle the Listing "created" event.
     */
    public function created(Listing $listing): void
    {
        // Create a new verification record for the listing
        Verification::create([
            'id' => 'VER-' . Str::random(10),
            'status' => 'pending',
            'listing_id' => $listing->id,
        ]);
    }

    //Nếu domain của listing thay đổi, đặt is_verified về false và tạo một bản ghi Verification mới với trạng thái pending
    public function updated(Listing $listing): void
    {
        if ($listing->isDirty('domain')) {
            $listing->is_verified = false;
            $listing->saveQuietly();

        }
    }

    /**
     * Handle the Listing "deleted" event.
     */
    public function deleted(Listing $listing): void
    {
        //
    }

    /**
     * Handle the Listing "restored" event.
     */
    public function restored(Listing $listing): void
    {
        //
    }

    /**
     * Handle the Listing "force deleted" event.
     */
    public function forceDeleted(Listing $listing): void
    {
        //
    }
}
