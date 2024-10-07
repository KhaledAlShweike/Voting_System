<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VoteController extends Controller
{
    /**
     * Cast a vote for a candidate by an authenticated user.
     *
     * @param Request $request
     * @param int $candidateId
     * @return JsonResponse
     */
    public function vote(Request $request, $candidateId): JsonResponse
    {
        // Ensure the user is authenticated using Sanctum
        $user = $request->user();  // Use Sanctum-provided method to get the authenticated user

        // Find the candidate and get the category
        $candidate = Candidate::findOrFail($candidateId);
        $categoryId = $candidate->category_id;

        // Check if the user has already voted in this category
        $existingVote = Vote::where('user_id', $user->id)
                            ->where('category_id', $categoryId)
                            ->first();

        if ($existingVote) {
            return response()->json(['message' => 'You have already voted for a candidate in this category.'], 403);
        }

        // Cast the vote
        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $candidateId,
            'category_id' => $categoryId
        ]);

        return response()->json(['message' => 'Vote successfully cast!'], 200);
    }
}
