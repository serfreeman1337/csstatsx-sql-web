<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
		public function list()
		{
			return view('top')->with('players', \App\Players::top());
		}
}
