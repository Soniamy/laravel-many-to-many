<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

//Model
use App\Models\Technology;

//Requests
use App\Http\Requests\Technology\StoreRequest as TechnologyStoreRequest;
use App\Http\Requests\Technology\UpdateRequest as TechnologyUpdateRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyStoreRequest $request)
    {
        $technologyData = $request->validated();

        $slug = Str::slug($request->input('title')) . '-' . now()->timestamp;

        $technology = Technology::create([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
         $posts = $technology->posts;

           return view('admin.technologies.show', compact('technology','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
             return view('admin.techologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnologyUpdateRequest $request, Technology $technology)
    {
         $technologyData = $request->validated();

       $slug = Str::slug($request->input('title')) . '-' . now()->timestamp;

        $technology = Technology::create([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
         $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
