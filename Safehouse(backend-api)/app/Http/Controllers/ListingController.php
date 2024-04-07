<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index(Request $request): mixed
    {
        
        return tap(Listing::query()->skip(((int)$request->page - 1) * (int)$request->perPage)->latest()->paginate($request->perPage), function ($paginator) {
            // Access pagination details here
            $currentPage = $paginator->currentPage();
            $perPage = $paginator->perPage();
            $hasMorePages = $paginator->hasMorePages();

            // Transform listing data
            return $paginator->getCollection()->map(fn ($listing) => [
                'id' => $listing->id,
                'property_name' => $listing->property_name,
                'property_type' => $listing->property_type,
                'bedroom' => $listing->bedroom,
                'bathroom' => $listing->bathroom,
                'date_available' => $listing->date_available,
                // Add pagination details to each item (optional)
                'current_page' => $currentPage,
                'per_page' => $perPage,
                'hasMorePages' => $hasMorePages
            ])->values();
        });
    }

    public function store(Request $request)
    {
        $request->validate([
            'bedroom' => ['nullable', 'string'],
            'bathroom' => ['nullable', 'string'],
            'square_areas' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'date_available' => ['nullable', 'string'],
            'year_built' => ['nullable', 'string'],
            'property_name' => ['nullable', 'string'],
            'property_type' => ['nullable', 'string'],
            'units' => ['nullable', 'string'],
            'property_address' => ['nullable', 'string'],
            'about_property' => ['nullable', 'string'],
            'listing_type' => ['nullable', 'string'],
            'property_price' => ['nullable', 'string'],
            'payment_type' => ['nullable', 'string'],
            'laundry' => ['nullable', 'string'],
            'cooling' => ['nullable', 'string'],
            'size' => ['nullable', 'string'],
            'lot_size' => ['nullable', 'string'],
            'heating' => ['nullable', 'string'],
            'parking_area' => ['nullable', 'string'],
        ]);


        $listing = Listing::create($request->only([
            'bedroom',
            'bathroom',
            'square_areas',
            'status',
            'city',
            'date_available',
            'year_built',
            'property_name',
            'property_type',
            'units',
            'property_address',
            'about_property',
            'listing_type',
            'property_price',
            'payment_type',
            'laundry',
            'cooling',
            'size',
            'lot_size',
            'heating',
            'parking_area',
        ]));


        foreach ($request->amenitity_features as $amenity) {

            $listing->amenity()->create([
                'type' => $amenity
            ]);
        }


        $media = $listing->media()->create([
            'property_video' => $request->property_video
        ]);

        foreach ($request->image_path as $path) {

            $media->mediaImage()->create([
                'image_path' => $path
            ]);
        }

        return response()->json([
            'message' => 'You have successfully created a new listing'
        ]);
    }
}
