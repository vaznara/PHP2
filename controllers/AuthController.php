<?php


namespace App\controllers;

use App\entities\User;
use App\main\App;

class AuthController extends Controller
{

    protected $templateName = 'login';

    public function defaultAction()
    {
        $this->render($this->templateName, []);
    }

    public function loginAction()
    {
        $this->templateName = 'login';
        $this->defaultAction();
        App::call()->auth->login();
    }

    public function registerAction()
    {
        $postData = App::call()->request->getPostData();
        $this->templateName = 'register';
        $this->defaultAction();

        if (key_exists('do', $this->requestParams->getGetParams())) {

            $newUser = new User();
            $newUser->sPassword = password_hash($postData['sPassword'], PASSWORD_DEFAULT);
            $newUser->sSessionId = $this->requestParams->getSessionId();
            $newUser->sLogin = $postData['sLogin'];
            $newUser->sName = $postData['sName'];

            App::call()->userRepository->save($newUser);
            return header('Location: /auth');
        }
    }

    public function logoutAction()
    {
        App::call()->auth->logoutUser();
        header('Location: /auth/login/');
    }
}