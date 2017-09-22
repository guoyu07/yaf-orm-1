<?php
use Illuminate\Database\Capsule\Manager as DB;
use App\Models\User;
class IndexController extends Yaf_Controller_Abstract {
    // 默认Action
    public function indexAction() {
        $user = User::orderBy('id', 'desc')->paginate(1);
        echo $user->toJson();
        // $this->getView()->assign('user', $user);
    }

    public function showAction() {
        echo 'show';
        exit;
    }
}