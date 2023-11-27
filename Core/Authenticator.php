<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password): bool
    {
        $db = App::resolve(Database::class);

        $user = $db->query('select * from users where email = :email', ['email' => $email])->find();

        if ($user && password_verify($password, $user['password'])) {
            $this->login(['email' => $email]);

            return true;
        }

        return false;
    }

    private function login($user): void
    {
        $_SESSION['user'] = ['email' => $user['email']];
    }

    private function logout(): void
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}