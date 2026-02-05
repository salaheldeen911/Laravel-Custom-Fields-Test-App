<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $posts = Post::withCustomFields()->latest()->get();

        return response()->json(['data' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        $post = DB::transaction(function () use ($request) {
            $post = Post::create($request->validated());
            $post->saveCustomFields($request->validated());

            // Refresh to get the saved relationships
            return $post->load('customFieldValues');
        });

        // Transform response
        $data = $post->toArray();
        $data['custom_fields'] = $post->customFieldsResponse();
        unset($data['custom_fields_values']);

        return response()->json([
            'message' => 'Post created successfully.',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $post = Post::withCustomFields()->findOrFail($id);

        // Transform the post to include flat custom fields
        $data = $post->toArray();
        $data['custom_fields'] = $post->customFieldsResponse();
        unset($data['custom_fields_values']);

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id): JsonResponse
    {
        $post = Post::findOrFail($id);

        $post = DB::transaction(function () use ($request, $post) {
            $post->update($request->safe()->except(array_keys(Post::getCustomFieldRules())));
            $post->updateCustomFields($request->validated());

            return $post->load('customFieldValues');
        });

        // Transform response
        $data = $post->toArray();
        $data['custom_fields'] = $post->customFieldsResponse();
        unset($data['custom_fields_values']);

        return response()->json([
            'message' => 'Post updated successfully.',
            'data' => $data,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfully.',
        ]);
    }
}
