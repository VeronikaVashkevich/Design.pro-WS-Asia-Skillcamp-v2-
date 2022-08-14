<?php


namespace App\Services;


use App\Models\DesignRequest;
use App\Rules\IssetStatus;

class DesignRequestService  extends BaseService
{
    const STATUS_IN_PROCESS = 'In process';
    const STATUS_COMPLETED = 'Completed';

    /**
     * @var DesignRequest
     */
    private $designRequest;

    public function __construct(DesignRequest $designRequest)
    {
        $this->designRequest = $designRequest;
    }

    public function handleImage($image)
    {
        $imageName =  auth()->id() . '_' . time() . '.'. $image->extension();
        $image->move(public_path('uploads'), $imageName);

        return $imageName;
    }

    public function saveDesignRequest($request)
    {
        $imageName = $this->handleImage($request->image);

        $this->designRequest->create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'image' => 'uploads/' . $imageName,
            'user_id' => auth()->id(),
        ]);
    }

    public function updateDesignRequest($request)
    {
        $designRequest = $this->designRequest->query()->where('id', $request->id)->first();

        $request->validate([
            'status' => ['required', new IssetStatus],
        ]);

        $status = $request->status;

        if ($status === self::STATUS_IN_PROCESS && $request->comment) {
            $designRequest->comment = $request->comment;
        }

        if ($status === self::STATUS_COMPLETED && $request->design) {
            $designRequest->design = 'uploads/' . $this->handleImage($request->design);
        }
        $designRequest->status = $request->status;
        $designRequest->save();
    }

    public function getUserDesignRequests($userId)
    {
        return $this->designRequest->query()->where('user_id', $userId)->get();
    }

    public function getLatestCompletedRequests()
    {
        return $this->designRequest->query()->where('status', self::STATUS_COMPLETED)->orderBy('created_at', 'desc')->limit(4)->get();
    }

    public function getProcessRequests()
    {
        return $this->designRequest->query()->where('status', self::STATUS_IN_PROCESS)->get();
    }

    public function countProcessRequests()
    {
        return count($this->getProcessRequests());
    }
}
