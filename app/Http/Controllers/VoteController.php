<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VoteController extends Controller
{
    public function vote(Request $request, $candidateId): JsonResponse
    {
        // Get the authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated: Could not find user'], 401);
        }

        // Proceed if the user is authenticated
        $userId = $user->id;

        $candidate = Candidate::findOrFail($candidateId);
        $categoryId = $candidate->category_id;

        // Check if the user has already voted for any candidate in this category
        $existingVote = Vote::where('user_id', $userId)
                            ->where('category_id', $categoryId)
                            ->first();

        if ($existingVote) {
            return response()->json(['message' => 'You have already voted for a candidate in this category.'], 403);
        }

        // Cast the vote
        Vote::create([
            'user_id' => $userId,
            'candidate_id' => $candidateId,
            'category_id' => $categoryId
        ]);

        return response()->json(['message' => 'Vote successfully cast!'], 200);
    }

}
