<?php

namespace App\Controller;

use App\View;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class UserController
{

    public function create(): View
    {
        return View::make('users/register.php');
    }

    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $firstName = explode(' ', $name)[0];

        $text = <<<Body
Hello $firstName,
Thank you for signing up!
Body;
        $html = <<<HTMLBody
<h1 style="text-align: center; color: blue;">Welcome</h1>
Hello $firstName,
<br /><br />
Thank you for signing up!
HTMLBody;

        $email = (new Email())->from('email@mail.com')
            ->to($email)
            ->subject('Welcome')
            ->attach('Hello world', 'welcome.txt')
            ->text($text)
            ->html($html);

        $transport = Transport::fromDsn($_ENV['MAILER_DSN']);

        $mailer = new Mailer($transport);

        $mailer->send($email);
    }
}