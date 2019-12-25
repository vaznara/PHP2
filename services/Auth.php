<?php


namespace App\services;
use App\main\App;

class Auth
{
    private $userGroups = [
        'ADMIN' => 'adminGroup',
        'USER' => 'userGroup',
        'GUEST' => 'guestGroup',
    ];

    public $userGroup;
    private $request;

    public function __construct()
    {
        $this->request = App::call()->request;
        $this->userGroup = $this->getUserGroup();
    }

    public function login()
    {
        if($this->getUserGroup()) {
            return $this->getUserGroup();
        }

        if (key_exists('do', $this->request->getGetParams())) {
            $loginData = App::call()->request->getPostData();
            $userData = App::call()->userRepository->getByLogin($loginData['sLogin']);

            if (empty($userData)) {
                echo '<p style="text-align: center; color: red;"><br /><br />Ошибка Авторизации! Неправильный логин или пароль</p>';
                return false;
            }

            if (password_verify($loginData['sPassword'], $userData->sPassword)) {
                $this->userGroup = $this->userGroups[$userData->sGroup];
                $this->setUser($this->userGroup, $userData->sName);
                App::call()->cartRepository->fillUserCart();
                return header('Location: /');
            }
            echo '<p style="text-align: center; color: red;"><br /><br />Ошибка Авторизации! Неправильный логин или пароль</p>';
            return false;
        }
    }

    public function setUser($group, $name)
    {
        $this->request->setSessionVar('group', $group);
        $this->request->setSessionVar('username', $name);
    }

    public function getUserName()
    {
        return $this->request->getSessionVar('username');
    }

    public function getUserGroup()
    {
        return $this->request->getSessionVar('group');
    }

    public function logoutUser() {
        session_destroy();
        $this->request->unsetSessionVar('group');
        $this->request->unsetSessionVar('username');
    }
}