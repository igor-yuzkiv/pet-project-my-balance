<?php


namespace App\helper;


/**
 * Trait ControllerHelper
 * @package App\helper
 */
trait ControllerHelper
{
    /**
     *
     * @param $result
     * @param null $successMessage
     * @param null $errorMessage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resultRedirect($result, $successMessage = null, $errorMessage = null)
    {
        $successMessage = ($successMessage === null) ? trans("basic.messages.success") : $successMessage;
        $errorMessage = ($errorMessage === null) ? [trans("basic.messages.error")] : $errorMessage;

        return ($result)
            ? redirect()->back()->with("message", $successMessage)
            : redirect()->back()->withErrors($errorMessage);
    }
}
