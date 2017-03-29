<?php

use service\database\DatabaseService;

require_once ('src/service/DatabaseService.php');

class PageController
{

    private $database;

    public function __construct()
    {
        $this->database = new DatabaseService();
        if ($_GET['route'] == 'main' || $_GET['route'] == '') {
            $subjects = $this->database->selectAllSubjects();
            $institutions = $this->database->selectAllInstitutions();
            $ranks = $this->database->selectAllRanks();
            $comments = $this->database->selectCommentsWithLimit(2);
            require 'app/Resources/view/baseTemplate.php';
        }
    }

    public function loginAction()
    {
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id']))
            header("Location: admin");
        else
            require_once ("app/Resources/view/admin/loginTemplate.php");
    }

    public function searchAction()
    {
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id']))
            require_once ('app/Resources/view/admin/searchTemplate.php');
        else
            require_once ("app/Resources/view/admin/loginTemplate.php");
    }

    public function createTeacherAction()
    {
        $categories = $this->database->selectAllCategories();
        $institutions = $this->database->selectAllInstitutions();
        $ranks = $this->database->selectAllRanks();
        $positions = $this->database->selectAllPositions();
        $teachers = $this->database->readAllTeachers();
        $subjects = $this->database->selectAllSubjects();
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            require_once ('app/Resources/view/admin/createTemplate.php');
        } else
            require_once ("app/Resources/view/admin/loginTemplate.php");
    }

    public function addSubjectAction()
    {
        $teachers = $this->database->readAllTeachers();
        $subjects = $this->database->selectAllSubjects();
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            require_once ('app/Resources/view/admin/addSubjectTemplate.php');
        } else
            require_once ("app/Resources/view/admin/loginTemplate.php");
    }

    public function addPhotoAction()
    {
        $teachers = $this->database->readAllTeachers();
        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            require_once ('app/Resources/view/admin/addPhotoTemplate.php');
        } else
            require_once ("app/Resources/view/admin/loginTemplate.php");
    }
}