<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'DebugKit.Toolbar',
        'Paginator',
        'Security',
    );

    /**
     * Helpers (Boostcake)
     *
     * @var array
     */
    public $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );

    /**
     * 先行フィルター
     */
    public function beforeFilter() {
        parent::beforeFilter();

        // 設定ファイルの読み込み
        Configure::load("admin_config.php");

        //Basic認証
        $this->autoRender = false;
        $loginId = Configure::read("basicauth.id");;
        $loginPassword = Configure::read("basicauth.password");;

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="Please enter your ID and password"');
            header('HTTP/1.0 401 Unauthorized');
            die("id / password Required");
        } else {
            if ($_SERVER['PHP_AUTH_USER'] != $loginId || $_SERVER['PHP_AUTH_PW'] != $loginPassword) {
                header('WWW-Authenticate: Basic realm="Please enter your ID and password"');
                header('HTTP/1.0 401 Unauthorized');
                die("Invalid id / password combination.  Please try again");
            }
        }
        $this->autoRender = true;
    }
}
