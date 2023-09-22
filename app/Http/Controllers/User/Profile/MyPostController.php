<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MyPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $myPosts = Post::latest('id')
            ->with('category')
            ->with('comments')
            ->where('user_id', auth()->user()->id)
            ->where('status', 1)
            ->get();

        $photo = auth()->user()->photo;
        $fullName = auth()->user()->name . ' ' . auth()->user()->surname . ' ' . auth()->user()->lastname;
        $number = auth()->user()->number;
        $countPosts = $myPosts->count();
        $sumViews = 0;
        foreach ($myPosts as $myPost) {
            $sumViews += $myPost->views;
        }
        $sumComments = 0;
        foreach ($myPosts as $myPost) {
            $sumComments += $myPost->comments->count();
            foreach ($myPost->comments as $comment) {
                $sumComments += $comment->replies->count();
            }
        }
        $dateAccount = auth()->user()->created_at->diffForHumans(now(), true);

        $array = [
            'photo' => $photo,
            'fullName' => $fullName,
            'number' => $number,
            'countPosts' => $countPosts,
            'allViews' => $sumViews,
            'sumComment' => $sumComments,
            'dateAccount' => $dateAccount,
        ];
        $dataProfile = (object)$array;

        $likePosts = Post::latest('id')
            ->whereLikedBy(auth()->user()->id)
            ->where('status', 1)
            ->get();

        return view('user.profile', compact('myPosts'), compact('dataProfile'))->with(compact('likePosts'));
    }
}
