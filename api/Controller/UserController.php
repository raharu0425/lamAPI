<?php
App::uses('AppController', 'Controller');
#use MessagePack\Packer;
#use MessagePack\BufferUnpacker;

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

    /**
     *  ユーザー作成
     */
    public function add()
    {
        var_dump('aa');
    }

    public function edit($id)
    {
        var_dump('edit' . $id);
        /*

        $this->loadModel('DataCastal');

        $entity = $this->DataCastal->find('first');

        var_dump($entity->getName2Identifer());

        $packer = new Packer();

        $packed = $packer->pack(array('aa' => 1));


        var_dump($packed);

        $unpacker = new BufferUnpacker();

        $unpacker->reset($packed);
        $unpacked = $unpacker->unpack();

        var_dump($unpacker);
         */

    }

}
