<?php

App::uses('ExceptionRenderer', 'Error');
App::uses('AppException', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    public function __construct(Exception $exception) {
        parent::__construct($exception);


        if ($exception instanceof AppException) {
            $this->method = 'errorApp';
        }
    }

    public function errorApp($error) {
        $message = $error->getMessage();
        $api_error_code = $error->api_error_code;

        $this->controller->response->statusCode($error->getCode());
        $result = array(
            'url' => $this->controller->request->here,
            'method' => $this->controller->request->method(),
            'code' => $api_error_code,
            'message' => $message,
            'error_exception' => $error,
        );

        echo json_encode($result);
    }

}
