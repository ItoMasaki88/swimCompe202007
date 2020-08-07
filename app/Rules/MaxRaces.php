<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Event;

class MaxRaces implements Rule
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
        return Event::find($value['eventId'])->races->count()
                  + $value['races'] < config('const.MAX_RACES') +1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'レースは最大'. config('const.MAX_RACES') .'までです';
    }
}
