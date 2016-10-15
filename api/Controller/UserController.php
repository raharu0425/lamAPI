<?php
App::uses('AppController', 'Controller');
App::uses('Response', 'Response');

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
    public $uses = array('User', 'Player');
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

        //リクエストパラメータの取得
        $name = $this->request->data('user_name');
        $hash = $this->request->data('hash');

        //レスポンスの作成
        $response = new Response($this);

        //入力チェック
        if(!$name || !$hash) throw new AppException('field create user (varidate_error)');

        try {
            $this->User->begin();
            $this->Player->begin();

            //ユーザーデータ作成
            $dto = $this->User->getBlankDto();
            $dto['name'] =  'raharu0425';
            $dto['hash'] =  'raharu0425';
            $user = $this->User->save($dto);
            $response->addEntity($user);

            //プレイヤーデータの作成
            $p_dto = $this->Player->getDefaultDto($user);
            $player = $this->Player->save($p_dto);
            $response->addEntity($player);

            $this->User->commit();
            $this->Player->commit();
        }catch(Exception $e){
            $this->User->rollback();
            $this->Player->rollback();
            throw new AppException($e->getMessage());
        }

        //出力
        $this->_output($response);
    }

}
