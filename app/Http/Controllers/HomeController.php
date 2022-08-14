<?php

namespace App\Http\Controllers;

use App\Models\DesignRequest;
use App\Models\User;
use App\Services\DesignRequestService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $designRequestService;

    protected $user;

    public function __construct(DesignRequestService $service, User $user)
    {
        $this->designRequestService = $service;
        $this->user = $user;
    }

    public function home()
    {
        $designRequests = $this->designRequestService->getUserDesignRequests(auth()->id());

        return view('home', compact('designRequests'));
    }

    public function adminPanel()
    {
        $requests = DesignRequest::all();

        return view('adminPanel', compact('requests'));
    }
}
