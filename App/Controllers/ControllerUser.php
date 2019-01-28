<?php

namespace Controllers;
use Core\Controller as Controller;
use Models\ModelUser as ModelUser;
use Core\View as View;
use Classes\Request as Request;

class ControllerUser extends Controller
{
    function __construct()
    {
        $this->model = new ModelUser();
        $this->view = new View();
    }

    function actionView(Request $request)
    {
        $login = $request->getInputData('login');
        $user = $this->model->getInfoAboutUser($login);
        $this->view->generate('UserView.php', array("user" => $user));
    }

    function actionActivation(Request $request)
    {
        $token=$request->getInputData('token');
        $email=$request->getInputData('email');
        $this->model->validation($token, $email);
        header("Location: /");
    }

    function actionForgot(Request $request)
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
            $this->view->generate('DraftView.php', array("data" => $init));
        }
        else
            $this->view->generate('DraftView.php', array("data" => "Аккаунт с введенной Вами почтой не зарегистрирован на нашем сайте"));
    }

    function actionForgotView(Request $request)
    {
        $this->view->generate('ForgotPasswordView.php', array("data"=>null));
    }

    function actionForgotConfirm(Request $request)
    {
        $token=$request->getInputData('token');
        $email=$request->getInputData('email');
        $data=$this->model->forgotCheckToken($token, $email);
        if($data==true)
            $this->view->generate('ChangePasswordView.php', array("data"=>$email));
        else
            $this->view->generate('DraftView.php', array("data"=>"Возникла ошибка при восстановлении пароля"));
    }

    function actionChangePassword(Request $request){
        $password=$request->getInputData('password');
        $email=$request->getInputData('email');
        if($password==null) {
            $this->view->generate('ChangePasswordView.php', array("error"=>"Пароли не совпадают"));
            die();
        }
        $data=$this->model->changePassword($password, $email);
        if($data)
            $this->view->generate('DraftView.php', array("data"=>"Пароль успешно изменен"));
        else
            $this->view->generate('DraftView.php', array("data"=>"Произошла ошибка при изменении пароля"));
    }

    function actionManageUsers(Request $request)
    {
        if(!empty($request->session['login']) and $request->session['role']=='admin')
        {
            $allUsers = $this->model->getAllUsers();
            $this->view->generate('ManageUsersView.php', array("users"=>$allUsers));
        }
        else
            header ("Location: /");
    }

    function actionDelete(Request $request)
    {
        if(!empty($request->session['login']) and $request->session['role']=='admin')
        {
            $this->model->deleteUser($request->getInputData('userId'));
            header ("Location: /user/manageUsers");
        }
        else
            header("Location: /");
    }
}