<?php

namespace App\Controllers;
use App\Libraries\GithubApi;

class User extends BaseController
{
    public function signin()
    {
        $githubService = new GithubApi();
        $data['github_login_url'] = $githubService->getAuthorizationUrl();
        echo view('template/header');
        echo view('user/signin', $data);
    }

    public function login()
    {
        $githubService = new GithubApi();
        $data = $githubService->getUserData($_GET['code']);
        if(!$data) {
            $githubService = new GithubApi();
            $data['github_login_url'] = $githubService->getAuthorizationUrl();
            $data['show_auth_error'] = 'Não foi possível efetuar o login, tente novamente!';
            echo view('template/header');
            echo view('user/signin', $data);
        } else {
            session()->set('user', $data);
            return redirect()->route('home.index');
        }
    }

    public function destroy()
    {
        session()->destroy();
        return redirect()->route('user.signin');
    }
}