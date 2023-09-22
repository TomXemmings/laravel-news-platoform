<?php

namespace App\Http\Controllers\User\Journalist;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($user)
    {
        $user = User::where('id', $user)->first();

        $photo = $user->photo;
        $fullName = $user->name . ' ' . $user->surname . ' ' . $user->lastname;
        $number = $user->number;
        $countPosts = $user->posts->count();
        $sumComments = 0;
        foreach ($user->posts as $post) {
            $sumComments += $post->comments->count();
            foreach ($post->comments as $comment) {
                $sumComments += $comment->replies->count();
            }
        }
        $sumViews = 0;
        foreach ($user->posts as $post) {
            $sumViews += $post->views;
        }
        $dateAccount = $user->created_at->diffForHumans(now(), true);

        $array = [
            'photo' => $photo,
            'fullName' => $fullName,
            'number' => $number,
            'countPosts' => $countPosts,
            'sumComment' => $sumComments,
            'allViews' => $sumViews,
            'dateAccount' => $dateAccount,
        ];
        $dataProfile = (object)$array;
        $posts = $user->posts;

        return view('user.journalist')
            ->with(compact('posts'))
            ->with(compact('dataProfile'));
    }
}
