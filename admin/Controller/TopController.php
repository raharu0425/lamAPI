<?php
App::uses('AdminAppController', 'Controller');
/**
 * Admin Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TopController extends AppController {

    public $autoLayout = true;

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

    public function index()
    {
        //設定ファイルからマスターの情報を取得
        $this->set('masters', Configure::read('masters'));

        $this->render('index');
    }
}
