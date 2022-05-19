<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Messages;
use core\ParamUtils;
use core\Utils;
use DateTime;

class UserCtrl {
    private $userDataForm;

    public function __construct(){
        $this->userDataForm = new UserDataForm();
    }

    public function validateSave() {

        $this->userDataForm->nick = ParamUtils::getFromRequest(
            'nick',
            true,
            'Błędne wywołanie aplikacji',
            null);
        $this->userDataForm->email = ParamUtils::getFromRequest(
            'email',
            true,
            'Błędne wywołanie aplikacji',
            null);
        $this->userDataForm->password = ParamUtils::getFromRequest(
            'password',
            true,
            'Błędne wywołanie aplikacji',
            null);
        $this->userDataForm->age = ParamUtils::getFromRequest(
            'age',
            true,
            'Błędne wywołanie aplikacji',
            null);

        if (Message::ERROR) return false;

        if (empty(trim($this->userDataForm->nick))) {
            (new \core\Messages)->addMessage('Wprowadź nick');
        }
        if (empty(trim($this->userDataForm->email))) {
            (new \core\Messages)->addMessage('Wprowadź email');
        }
        if (empty(trim($this->userDataForm->password))) {
            (new \core\Messages)->addMessage('Wprowadź hasło');
        }
        if (empty(trim($this->userDataForm->dateOfBirth))) {
            (new \core\Messages)->addMessage('Wprowadź hasło');
        }

        if (Message::isError()) return false;


        $formattedDateOfBirth = DateTime::createFromFormat('Y-m-d', $this->userDataForm->dateOfBirth);
        if ( $formattedDateOfBirth === false ){

            getMessages()->addError('Zły format daty. Przykład: 2015-12-20');
        }

        return ! Message::isError();
    }



    public function action_hello() {


        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");

        App::getSmarty()->assign("value",$variable);
        App::getSmarty()->display("Hello.tpl");

    }

}
