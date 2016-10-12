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

        $meta = array(
            'url' => $this->controller->request->here,
            'method' => $this->controller->request->method(),
        );
        $this->controller->set(array(
            'meta' => $meta,
            'error' => array(
                'message' => $message,
                'code' => $api_error_code,
            ),
            'error_exception' => $error,
            '_serialize' => array('meta', 'error')
        ));

        echo json_encode($result);

        //$this->_outputMessage('errorApi');
    }

}
