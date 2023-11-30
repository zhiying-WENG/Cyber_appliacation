<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Password;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{

    public function register(): Response
    {
        $response = new Response(
            $this->render('User/register')
        );

        return $response->send();
    }

    public function registerProcess(): Response
    {
        $userForm = [
            "email" => $this->request->get('email'),
            "password" => $this->request->get('password'),
            "passwordConfirm" => $this->request->get('password_confirm'),
            "lastname" => $this->request->get('lastname'),
            "firstname" => $this->request->get('firstname'),
        ];

        $error = [];

        // Check if all fields are filled
        foreach ($userForm as $key => $value)
            if (empty($value))
                $error[] = $key . ' is empty';

        if (!filter_var($userForm['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = 'email is not valid';
        }

        // Check if password and passwordConfirm are the same
        if ($userForm['password'] !== $userForm['passwordConfirm'])
            $error[] = 'passwords are not the same';

        $userModel = new User();
        $exist = $userModel->isEmailExists($userForm['email']);

        if ($exist)
            $error[] = 'email already exists !';

        $passwordService = new Password();
        if (!$passwordService->checkPasswordStrength($userForm['password'])) {
            $error[] = 'password weak';
        }


        if (!empty($error)) {
            return $this->errorForm($error, $userForm);
        }

        $userCreation = $userModel->create(
            $userForm['email'],
            password_hash($userForm['password'], PASSWORD_DEFAULT),
            $userForm['lastname'],
            $userForm['firstname']
        );

        if (!$userCreation) {
            return $this->errorForm(['user creation failed'], $userForm);
        }

        $response = new Response(
            $this->render('User/register', [
                'success' => 'User has been created, please login'
            ])
        );

        return $response->send();

    }

    private function errorForm(array $errors, array $form = []): Response
    {
        $response = new Response(
            $this->render('User/register', [
                'error' => $errors,
                'userForm' => $form
            ])
        );
        return $response->send();
    }


}