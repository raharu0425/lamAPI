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
        $this->LoadModels(['User', 'Player']);

        //リクエストパラメータの取得
        $name = $this->request->data('user_name');
        $hash = $this->request->data('hash');

        /*
        //入力チェック
        if(!$name || !$hash) throw new AppException('field create user (varidate_error)');
         */


        try {
            $this->User->begin();
            //$this->Player->begin();

            //ユーザーデータ作成
            $dto = $this->User->getBlankDto();
            $dto['name'] =  'raharu0425';
            $dto['hash'] =  'raharu0425';
            $user = $this->User->save($dto);

            var_dump($user);

            //プレイヤーデータの作成
            $p_dto = $this->Player->getDefaultDto($user);
            $this->Player->save($p_dto);
            /*
            $user_dto = $this->User->getModelArray();
            $user_dto['name'] = 'らはる';
            $user_dto['hash'] = 'vavasdasdvasd';

            var_dump($user_dto);
            $this->User->save(['User' => $user_dto]);
             */
            
            $this->User->commit();
            //$this->Player->commit();
        }catch(Exception $e){
            $this->User->commit();
            //$this->Player->commit();
            throw new AppException($e->getMessage());
        }


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
