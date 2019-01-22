<?php


class Controller_Items extends Controller
{
    function __construct()
    {
        $this->model = new Model_Items();
        $this->view = new View();
    }

    function action_index($request)
    {
        $data = $this->model->getAllItems();
        $this->view->generate('items_view.php', 'template_view.php', array("data"=>$data));
    }

    function action_view($request)
    {
        $itemId=$request->getInputData('itemId');
        $item = $this->model->getInfoAboutItem($itemId);
        if(!empty($item))
            $this->view->generate('item_view.php', 'template_view.php', array("item" => $item));
        else
            header ("Location: /404");
    }

    function action_edit($request)
    {
        if(!empty($request->session) and ($request->session['role']=='admin') or ($request->session['role']=='moder')) {
            $itemName = $request->getInputData('itemName');
            $itemName = str_replace('_', ' ', $itemName);
            $data = $this->model->getInfoAboutItem($itemName);
            $this->view->generate('edit_item_view.php', 'template_view.php', array("data" => $data));
        }
        else
            header("Location: /");
    }

    function action_confirm_edit($request)
    {
        $item=new Item();
        $item->id=$request->getInputData('itemId');
        $item->name=$request->getInputData('itemName');
        $item->picture_url=$request->getInputData('itemPicture');
        $item->characteristics=$request->getInputData('itemCharacteristics');
        $item->description=$request->getInputData('itemDescription');
        $item->price=$request->getInputData('itemPrice');
        $item->mana=$request->getInputData('itemMana');
        $item->reloadTime=$request->getInputData('itemReloadTime');
        $data=$this->model->updateItem($item);
        header('Location: /items/view/'.str_replace(' ', '_', $item->name));
    }
}