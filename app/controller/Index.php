<?php

namespace app\controller;

use app\BaseController;
use app\model\User;
use think\facade\Session;

class Index extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function detail()
    {
        return view('detail');
    }
    //登录
    public function login()
    {
        $query = $this->request->param();
        if (empty($query['password']) || empty($query['name'])) {
            return view('login', ['error' => '参数错误']);
        }
        $user = User::where('name', $query['name'])->find();

        if ($user && password_verify($user->password, $query['password'])) {

            Session::set('user_id', $user->id);
            return view('login', ['success' => '登录成功', 'code' => 1]);
        } else {
            return view('login', ['error' => '用户名或密码错误']);
        }
    }
    //注册
    public function register()
    {
        if ($this->request->isPost()) {
            // 接收表单数据
            $data = $this->request->post();
            if (empty($data['name']) || empty($data['password'])) {
                return view('register', ['error' => '参数错误']);
            }

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $userModel = new \app\model\User();
            if ($userModel->save($data)) {
                return view('register', ['success' => '注册成功', 'code' => 1]);
            } else {
                return view('register', ['error' => '注册失败，请稍后再试', 'code' => 0]);
            }
        }

        return view('register');
    }
}
