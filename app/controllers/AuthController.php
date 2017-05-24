<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 15:58
 */
class AuthController extends BaseController {

    protected $nick;
    protected $uid;

    public function __construct() {
        $uid = Session::get('uid');
        if (empty($uid)) {
            redirect_error('login', 'session已过期', 115);
        } else {
            $userinfo = $this->getUserinfoFromID($uid);
            if ($userinfo) {
                $this->uid = $uid;
                $this->nick = $userinfo['nick'];
                $this->view->data['nick'] = $userinfo['nick'];
            } else {
                redirect('login');
            }
        }
    }

    protected function getUserinfoFromID($uid) {
        if ($uid == null) {
            $uid = $this->getUidFromSession();
        }

        return Users::where('id', $uid)->first();
    }

    protected function getUidFromSession() {
        $session = Session::get('uid');
        if (empty($session)) {
            return false;
        } else {
            return $session;
        }
    }
}