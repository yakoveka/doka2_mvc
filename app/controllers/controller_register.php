<?php

class Controller_Register extends Controller
{

    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('register_view.php', 'template_view.php', array('data' => 'register'));
    }

    function action_writeUser($user)
    {
        $user->token = md5($user->email . time());
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $this->view->generate('register_view.php', 'template_view.php', array("data" => "Email введен некорректно"));
            die();
        } elseif (strlen($user->password) < 6) {
            $this->view->generate('register_view.php', 'template_view.php', array("data" => "Пароль должен быть не меньше 6 символов"));
            die();
        }

        $flag = $this->model->set_user_info($user);
        if ($flag == false) {
            $this->view->generate('register_view.php', 'template_view.php', array("data" => "Что-то пошло не так"));
            die();
        } elseif ($flag == true) {
            $subject = 'Confirm email on the ' . $_SERVER['HTTP_HOST'];
            $message = 'Здравствуйте! <br/> <br/> Сегодня ' . date("d.m.Y", time()) . ', неким пользователем была произведена регистрация на сайте <a href="doka2.common">' .
                $_SERVER['HTTP_HOST'] . '</a> используя Ваш email <br/>Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке: 
                <a href="doka2.commonn/user/activation?token=' . $user->token . '&email=' . $user->email . '">'.$user->token.'</a> <br/> <br/> В противном случае, если это были не Вы, 
                то, просто игнорируйте это письмо. 
                <br/> <br/> <strong>Внимание!</strong> Ссылка действительна 24 часа. После чего Ваш аккаунт будет удален из базы.';
            $headers = 'From: yakovekoo@gmail.com' . "\r\n" .
                'Reply-To: yakovekoo@gmail.com' . "\r\n" .
                'Content-type:text/html' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            if (mail($user->email, $subject, $message, $headers)) {
                $init = "<h4 class='success_message'><strong>Регистрация прошла успешно!!!</strong></h4><p class='success_message'> Теперь необходимо подтвердить введенный адрес электронной почты. Для этого, перейдите по ссылке указанную в сообщение, которую получили на почту " . $user->email . " </p>";
            } else {
                $init = "<p class='mesage_error' >Ошибка при отправлении письма с сылкой подтверждения, на почту " . $user->email . " </p>";
            }
        }
        $this->view->generate('register_view.php', 'template_view.php', array("data" => $init));
    }
}