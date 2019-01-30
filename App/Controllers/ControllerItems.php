<?php

namespace Controllers;
use Classes\Request as Request;
use Models\ModelItems as ModelItems;
use Core\View as View;
use Classes\Item as Item;


class ControllerItems extends ControllerResource
{
    function __construct()
    {
        $this->model = new ModelItems();
        $this->view = new View();
    }

    function actionIndex(Request $request)
    {
        parent::actionIndex($request);
    }

    function actionView(Request $request)
    {
        $itemId=$request->getInputData('itemId');
        $item = $this->model->getInfoAboutItem($itemId);
        if(!empty($item))
            $this->view->generate('ItemView.php', array("item" => $item));
        else
            header ("Location: /404");
    }

    function actionEdit(Request $request)
    {
        if(!empty($request->session) and ($request->session['role']=='admin') or ($request->session['role']=='moder')) {
            $itemName = $request->getInputData('itemName');
            $itemName = str_replace('_', ' ', $itemName);
            $data = $this->model->getInfoAboutItem($itemName);
            $this->view->generate('EditItemView.php', array("data" => $data));
        }
        else
            header("Location: /");
    }

    function actionConfirmEdit(Request $request)
    {
        $item=new Item();
        $item->id=$request->getInputData('itemId');
        $item->name=$request->getInputData('itemName');
        $item->pictureUrl=$request->getInputData('itemPicture');
        $item->characteristics=$request->getInputData('itemCharacteristics');
        $item->description=$request->getInputData('itemDescription');
        $item->price=$request->getInputData('itemPrice');
        $item->mana=$request->getInputData('itemMana');
        $item->reloadTime=$request->getInputData('itemReloadTime');
        $this->model->updateItem($item);
        header('Location: /items/View/'.str_replace(' ', '_', $item->name));
    }
}