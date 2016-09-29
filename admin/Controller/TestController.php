<?php
App::uses('AppController', 'Controller');
/**
 * Test Controller
 *
 * @property Test $Test
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TestController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');


    public function index()
    {
        $this->autoRender = false;
        var_dump('aaaaa');
    }

}
