<?php

namespace service\validator;


class ValidationService
{

    private $fullName = '/^[а-яіїєА-ЯІЇЄ\s]+$/';
    private $number = '/^[0-9]{1,16}$/';
    private $text = '/^[а-яА-ЯёЁa-zA-Z0-9 ]+$/';

    private $regEx = array(
        'username' => '/^[a-zA-Z][a-zA-Z0-9-_.]{1,20}$/',
        'password' => '/^[a-zA-Z0-9]+$/'
    );


    public function validateAuthForm($username, $password)
    {
        $result = null;
        $checking = array(
            'username' => preg_match($this->regEx['username'], $username),
            'password' => preg_match($this->regEx['password'], $password)
        );

        $result = $checking['username'] && $checking['password'];

        return $result;
    }


    public function validateSearch($query)
    {
        $checking = preg_match($this->fullName, $query);
        $results = array(
            'checking' => $checking,
            'message' => 'не коректно введений запит'
        );
        return $results;
    }



    public function validateData($args)
    {
        $checkingName = preg_match($this->fullName, $args['fullName']);
        $checkingCategory = preg_match($this->number, $args['category']);
        $checkingPosition = preg_match($this->number, $args['position']);
        $checkingInstitution = preg_match($this->number, $args['institution']);
        $checkingRank = preg_match($this->number, $args['rank']);
        $checkingText = preg_match($this->text, $args['text']);
        $checking = $checkingName && $checkingCategory && $checkingInstitution &&
            $checkingPosition && $checkingRank && $checkingText;
        $results = array(
            'checking' => $checking,
            'message' => 'не коректно введені дані'
        );
        return $results;
    }

}