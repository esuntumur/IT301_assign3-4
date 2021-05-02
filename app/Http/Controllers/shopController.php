<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{
    public function doAddContent(Request $request)
    {
        $user = DB::table('shop')->where('email', $request->email)
            ->where('token', $request->token);
        if ($user) {
            DB::table('content')->insert([
                'contentId' => $request->contentId
            ]);
            return redirect()->back()->withSuccess('Таны оруулсан контент амжилттай нэмэгдлээ');
        }
    }
}