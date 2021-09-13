<?php

namespace App\Rules;

use App\Coupon;
use Illuminate\Contracts\Validation\Rule;

class ValidCoupon implements Rule
{
    private $coupon;
    private $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(?Coupon $coupon)
    {
        $this->coupon = $coupon;
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
        if (!$this->coupon || is_null($this->coupon)) {
            return $this->fail("Coupon Non Valido");
        }


        if ($this->coupon->hasExpired()) {
            return $this->fail("Coupon Scaduto");
        }

        return true;
    }

    public function fail($message)
    {
        $this->message = $message;
        return false;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
