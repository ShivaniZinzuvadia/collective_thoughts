<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ShowPage extends Controller
{
    /**
     * Get all thoughts submitted by given username
     * Show MyPage with all thoughts
     */
    public function getMyPage($username) {
        $thoughts = User::where('username', $username)->first()->thoughts->toArray();
        $thoughtCount = count($thoughts);
        // Add static image details for each thought
        $imgCount = 0;
        foreach($thoughts as $key => $value){
            if($imgCount >= 6 ){
                $imgCount = 1;
            } else {
                $imgCount += 1;
            }
            $thoughts[$key] = array_merge($value, ['image'=>'public/images/'. $imgCount . '.jpg']);
        }
        return view('mypage', compact('thoughts', 'thoughtCount'));
    }
}

