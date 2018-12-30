<?php
class Controller_User extends Controller
{
    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_view($request)
    {
        $login = $request->getInputData('login');
        $data = $this->model->getInfoAboutUser($login);
        $this->view->generate('user_view.php', 'template_view.php', array("data" => $data));
    }

    function action_activation($request)
    {
        $token=$request->getInputData('token');
        $email=$request->getInputData('email');
        $this->model->validation($token, $email);
        header("Location: /");
    }

    function action_forgot($request)
    {
        $email=$request->getInputData('email');
        $token = md5($email . time());
        $data=$this->model->forgotPasswordSetToken($email, $token);
        if($data==true) {
            $subject = 'Confirm email on the '.$_SERVER['HTTP_HOST'];
            $message = 'Здравствуйте! <br/>Если вы запрашивали восстановление пароля к сайту '.$_SERVER['HTTP_HOST'].', то перейдите по ссылке:
            <a href="'.$_SERVER['HTTP_HOST'].'/user/forgotConfirm?token='.$token.'&email='.$email.'">Ссылка</a><br/> В противном случае, 
            если это были не Вы, то просто игнорируйте это письмо.';
            $headers = 'From: yakovekoo@gmail.com' . "\r\n" .
                'Reply-To: yakovekoo@gmail.com' . "\r\n" .
                'Content-type:text/html' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            if (mail($email, $subject, $message, $headers)) {
                $init = "<p> Теперь необходимо перейти по ссылке в письме.</p>";
            } else {
                $init = "<p>Ошибка при отправлении письма с сылкой восстановления, на почту " . $email . " </p>";
            }
            $this->view->generate('draft_view.php', 'template_view.php', array("data" => $init));
        }
        else
            $this->view->generate('draft_view.php', 'template_view.php', array("data" => "Аккаунт с введенной Вами почтой не зарегистрирован на нашем сайте"));
    }

    function action_forgot_view($request)
    {
        $this->view->generate('forgot_password_view.php', 'template_view.php', array("data"=>null));
    }

    function action_forgot_confirm($request)
    {
        $token=$request->getInputData('token');
        $email=$request->getInputData('email');
        $data=$this->model->forgotCheckToken($token, $email);
        if($data==true)
            $this->view->generate('change_password_view.php', 'template_view.php', array("data"=>$email));
        else
            $this->view->generate('draft_view.php', 'template_view.php', array("data"=>"Возникла ошибка при восстановлении пароля"));
    }

    function action_change_password($request){
        $password=$request->getInputData('password');
        $email=$request->getInputData('email');
        if($password==null) {
            $this->view->generate('change_password_view.php', 'template_view.php', array("error"=>"Пароли не совпадают"));
            die();
        }
        $data=$this->model->changePassword($password, $email);
        if($data)
            $this->view->generate('draft_view.php', 'template_view.php', array("data"=>"Пароль успешно изменен"));
        else
            $this->view->generate('draft_view.php', 'template_view.php', array("data"=>"Произошла ошибка при изменении пароля"));
    }
}