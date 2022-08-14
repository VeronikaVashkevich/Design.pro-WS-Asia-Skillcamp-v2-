<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignRequestCreateRequest;
use App\Http\Requests\DesignRequestEditRequest;
use App\Models\DesignRequest;
use App\Services\DesignRequestService;

class DesignRequestController extends Controller
{

    /**
     * @var DesignRequestService
     */
    private $service;

    public function __construct(DesignRequestService $service)
    {
        $this->service = $service;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = DesignRequestService::getCategories();

        return view('requests.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DesignRequestCreateRequest $request)
    {
        $request->validated();

        $this->service->saveDesignRequest($request);

        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DesignRequest $designRequest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($designRequest)
    {
        $designRequest = DesignRequest::query()->where('id', $designRequest)->first();
        $categories = DesignRequestService::getCategories();
        $statuses = DesignRequestService::getStatuses();

        return view('requests.edit', [
            'request' => $designRequest,
            'categories' => $categories,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DesignRequestEditRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(DesignRequestEditRequest $request)
    {
        $request->validated();

        $this->service->updateDesignRequest($request);

        return redirect('/admin-panel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DesignRequest $designRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DesignRequest $designRequest)
    {
        $designRequest->delete();

        return back();
    }
}
