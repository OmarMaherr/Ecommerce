<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
   public  function  ChangeLang($lang)
   {
           session()->put('locale',$lang);
           return redirect()->back();

   }
}
