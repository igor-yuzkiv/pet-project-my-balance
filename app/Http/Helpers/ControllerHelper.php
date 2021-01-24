<?php


namespace App\Http\Helpers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Trait ControllerHelper
 * @package App\Http\Helpers
 */
trait ControllerHelper
{
    /**
     * @param $result
     * @param array $successMessages
     * @param $errorMessages
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resultRedirect($result, array $successMessages, array $errorMessages)
    {
        $message = ($result) ? $successMessages : $errorMessages;

        if (is_array($message)) {
            $message = $this->messagesToHtmlList($message);
        }

        if ($result) {
            return redirect()->back()->with("message", $message);
        } else {
            return redirect()->back()->withErrors($message);
        }
    }


    /**
     * @param array $messages
     * @return string
     */
    protected function messagesToHtmlList(array $messages)
    {
        $result = '<ul style="list-style: none; padding: 0; margin: 0;">';
        foreach ($messages as $item) {
            $result .= '<li>' . $item . '</li>';
        }
        return $result;
    }
}
