<?php
// add code
namespace App\Controllers;

use App\Services\Message;
use App\Services\Csrf;

use App\Models\User;
use App\Services\Password;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends AbstractController
{


    public function changePassword(): Response
    {
        $response = new Response(
            $this->render('ChangePassword/change_password', [
                "messages" => (new Message())->getMessages(),
                "csrf" => (new Csrf())->generate(),
            ])
        );

        return $response->send();
    }
    public function changePasswordProcess(): Response
    {
        if (!(new Csrf())->check($this->request->get('csrf'))) {
            return $this->error('Invalid CSRF token', 400);
        }

        $message = new Message();

        $passwordOld = $this->request->get('password_old');
        $password = $this->request->get('password');
        $passwordConfirm = $this->request->get('password_confirm');

        if (empty($passwordOld) || empty($password) || empty($passwordConfirm)) {
            $message->addMessage('All fields are required');
            $response = new RedirectResponse("/change_password");
            return $response->send();
        }

        // Check if password and passwordConfirm are the same
        if ($password !== $passwordConfirm) {
            $message->addMessage('passwords are not the same');
            $response = new RedirectResponse("/change_password");
            return $response->send();
        }

        // Check if password input and password in DB are the same
        $userModel = new User();

        $passwordOldDB = $userModel->getPasswordById($_SESSION['user']['id']);

        if (!$passwordOldDB || !password_verify($passwordOld, $passwordOldDB)) {
            $message->addMessage('Password incorrect');
            $response = new RedirectResponse("/change_password");
            return $response->send();
        }

        $changePassword = $userModel->changePassword(
            $_SESSION['user']['id'],
            password_hash($password, PASSWORD_DEFAULT)
        );

        $passwordService = new Password();
        if(!$passwordService->checkPasswordStrength($password)){
            $message->addMessage('Password too weak');
            $response = new RedirectResponse("/change_password");
            return $response->send();
        }

        if (!$changePassword) {
            $message->addMessage('change password failed');
            $response = new RedirectResponse("/change_password");
            return $response->send();
        }

        $message->addMessage('Password has been changed successfully !');

        $response = new RedirectResponse("/dashboard");
        return $response->send();
    }

}