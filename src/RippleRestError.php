<?php
/**
 * Contains class RippleRestError
 *
 * @license MIT
 */
 
/**
 * Throws if RippleRest server returns an error.
 */
class RippleRestError extends Exception {
    /**
     * Returns the original RippleRest error object.
     * @return mixed
     */
    public $error;
}