<?php


namespace App\Http\Controllers;


use App\Services\DesignRequestService;

class IndexController extends Controller
{
    /**
     * @var DesignRequestService
     */
    private $service;

    public function __construct(DesignRequestService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $latestRequests = $this->service->getLatestCompletedRequests();
        $counter = $this->service->countProcessRequests();

        return view('index', [
            'latestRequests' => $latestRequests,
            'counter' => $counter,
        ]);
    }

    public function updateCounter()
    {
        return $this->service->countProcessRequests();
    }
}
