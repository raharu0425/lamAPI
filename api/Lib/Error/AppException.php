<?php
class AppException extends CakeException {

    //アプリ固有コード
    public $api_error_code;

    public function __construct($message = null, $code = 500) {
        if (empty($message)) {
            $message = 'Application Error';
        }
        $this->api_error_code = $code;
        parent::__construct($message, $code);
    }

};
