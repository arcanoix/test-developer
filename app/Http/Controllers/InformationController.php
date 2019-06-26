<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

use App\Http\Requests\InformationRequest;

class InformationController extends Controller
{


	public function index() {
		$information = Information::all();

		return view('list', compact('information'));
	}



    public function store(InformationRequest $request) {

    		$newinformation = new Information($request->all());
    		$newinformation->save();

    		if($newinformation) {
    			return response()->json(
    				[
    					'newinformation' => $newinformation
    				]
    			);
    		}
    	
    		
    }
}
