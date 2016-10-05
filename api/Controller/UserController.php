<?php
App::uses('AppController', 'Controller');
/**
 * User Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UserController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash', 'RequestHandler');
    public $autoRender = false;


    public function index()
    {
        $test = array();
        $test['date'] = date('YYYY-mm-dd');

        echo json_encode($test);
    }

    public function add()
    {
        var_dump('aa');
    }

    public function edit($id)
    {
        var_dump('edit' . $id);
    }

}
