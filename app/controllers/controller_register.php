<?php


class Controller_Register extends Controller
{
    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index($request)
    {
        $this->view->generate('register_view.php', 'template_view.php', array('data' => 'register'));
    }

    function action_writeUser($request)
    {
        $user=new User();
        $user->login=$request->getInputData('login');
        $user->email=$request->getInputData('email');
        $user->password=$request->getInputData('password');
        $user->first_name=$request->getInputData('first_name');
        $user->last_name=$request->getInputData('last_name');
        $user->token = md5($user->email . time());
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $this->view->generate('register_view.php', 'template_view.php', array("data" => "Email введен некорректно"));
            die();
        } elseif (strlen($user->password) < 6) {
            $this->view->generate('register_view.php', 'template_view.php', array("data" => "Пароль должен быть не меньше 6 символов"));
            die();
        }
        $flag = $this->model->setInfoAboutUser($user);
        if ($flag == false) {
            $this->view->generate('register_view.php', 'template_view.php', array("data" => "Что-то пошло не так"));
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
                $init = "<h4 class='success_message'><strong>Регистрация прошла успешно!!!</strong></h4><p class='success_message'> Теперь необходимо подтвердить введенный адрес электронной почты. Для этого, перейдите по ссылке указанную в сообщение, которую получили на почту " . $user->email . " </p>";
            } else {
                $init = "<p class='mesage_error' >Ошибка при отправлении письма с сылкой подтверждения, на почту " . $user->email . " </p>";
            }
        }
        $this->view->generate('draft_view.php', 'template_view.php', array("data" => $init));
    }
}