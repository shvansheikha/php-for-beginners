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
        Session::destroy();
    }
}