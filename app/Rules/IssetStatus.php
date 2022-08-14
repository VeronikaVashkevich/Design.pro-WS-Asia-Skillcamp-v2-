<?php

namespace App\Rules;

use App\Services\DesignRequestService;
use Illuminate\Contracts\Validation\Rule;

class IssetStatus implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $statuses = DesignRequestService::getStatuses();

        return in_array($value, $statuses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrong status';
    }
}
