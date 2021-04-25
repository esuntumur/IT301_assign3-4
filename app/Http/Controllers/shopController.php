<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{
    public function addContentForm(Request $request)
    {
        return view('layout.masterShop', ['contentId' => $request->contentId]);
    }
}
