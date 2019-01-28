<?php

namespace Controllers;
use Core\Controller as Controller;
use Models\ModelRegister as ModelRegister;
use Classes\Request as Request;
use Core\View as View;
use Classes\User as User;

class ControllerRegister extends Controller
{
    function __construct()
    {
        $this->model = new ModelRegister();
        $this->view = new View();
    }

    function actionIndex(Request $request)
    {
        $this->view->generate('registerView.php', array("data" => 'Register'));
    }

    function actionWriteUser(Request $request)
    {
        $user=new User();
        $user->login=$request->getInputData('login');
        $user->email=$request->getInputData('email');
        $user->password=$request->getInputData('password');
        $user->firstName=$request->getInputData('firstName');
        $user->lastName=$request->getInputData('lastName');
        $user->token = md5($user->email . time());
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $this->view->generate('RegisterView.php', array("data" => "Email введен некорректно"));
            die();
        } elseif (strlen($user->password) < 6) {
            $this->view->generate('RegisterView.php', array("data" => "Пароль должен быть не меньше 6 символов"));
            die();
        }
        $flag = $this->model->setInfoAboutUser($user);
        if ($flag == false) {
            $this->view->generate('RegisterView.php', array("data" => "Введенный логин уже занят, попробуйте другой"));
            die();
        } elseif ($flag == true) {
            $subject = 'Confirm email on the ' . $_SERVER['HTTP_HOST'];
            $message = 'Здравствуйте!<br/> Сегодня ' . date("d.m.Y", time()) . ', неким пользователем была произведена регистрация на сайте <a href="'.$_SERVER['HTTP_HOST'].'"></a> 
                используя Ваш email <br/>Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке: 
                <a href="'.$_SERVER['HTTP_HOST'].'/user/activation?token='.$user->token.'&email='.$user->email.'">Ссылка</a><br/> В противном случае, если это были не Вы, 
                то, просто игнорируйте это письмо';
            $headers = 'From: yakovekoo@gmail.com' . "\r\n" .
                'Reply-To: yakovekoo@gmail.com' . "\r\n" .
                'Content-type:text/html' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            if (mail($user->email, $subject, $message, $headers)) {
                $init = "<h4 class='successMessage'><strong>Регистрация прошла успешно!!!</strong></h4><p class='successMessage'> Теперь необходимо подтвердить введенный адрес электронной почты. Для этого, перейдите по ссылке указанную в сообщение, которую получили на почту " . $user->email . " </p>";
            } else {
                $init = "<p class='messageError' >Ошибка при отправлении письма с сылкой подтверждения, на почту " . $user->email . " </p>";
            }
        }
        $this->view->generate('DraftView.php', array("data" => $init));
    }
}