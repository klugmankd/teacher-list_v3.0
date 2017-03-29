<?php


use service\database\DatabaseService;
use service\search\SearchService;
use service\validator\ValidationService;

require_once ('src/service/DatabaseService.php');
require_once ('src/service/SearchService.php');
require_once ('src/service/ValidationService.php');

class AdminController
{

    private $database;
    private $search;
    private $validator;
    private $login;
    private $password;
    private $name;
    private $idComment;
    private $estimate;
    private $id;
    private $photo;
    private $idTeacher;

    public function __construct()
    {
        $this->search = new SearchService();
        $this->database = new DatabaseService();
        $this->validator = new ValidationService();
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $this->name = $_POST['name'];
        $this->idComment = $_POST['idComment'];
        $this->estimate = $_POST['estimate'];
        $this->id = $_GET['id'];
        $this->idTeacher = $_POST['teacher'];
        $this->photo = $_FILES['img'];
    }

    public function indexAction()
    {
        session_start();
        if(!empty($_SESSION["id"]))
            require_once ('app/Resources/view/admin/adminTemplate.php');
        else
            header('Location: login');
    }
    
    public function checkAction()
    {
        $checking = $this
            ->validator
            ->validateAuthForm($this->login, $this->password);

        if (!$checking)
            header('Location: ../login');

        session_start();

        if ($this->login == ADMIN_LOGIN && $this->password == ADMIN_PASSWORD) {
            $_SESSION['id'] = 'admin';
            header('Location: ../admin');
        } else {
            header('Location: ../login');
        }
    }

    public function findTeachersAction()
    {
        $teachers = $this
            ->search
            ->findByName($this->name);
        foreach ($teachers as $teacher)
            require ('app/Resources/view/teacherItemTemplate.php');
    }

    public function showNewCommentsAction()
    {
        $comments = $this->database->selectAllNewComments();
        require ("app/Resources/view/admin/listOfCommentTemplate.php");
    }

    public function selectTeacherOnceAction()
    {
        $categories = $this->database->selectAllCategories();
        $ranks = $this->database->selectAllRanks();
        $institutions = $this->database->selectAllInstitutions();
        $positions = $this->database->selectAllPositions();
        $teacher = $this->database->readAllAboutOnce($this->id);
        require_once ("app/Resources/view/admin/profileTemplate.php");

    }

    public function checkNewCommentAction()
    {
        $message = 'Відгук оцінено успішно';
        if ($this->estimate)
            $result = $this
                ->database
                ->approveComment($this->idComment);
        else
            $result = $this
                ->database
                ->disapproveComment($this->idComment);
        if (!$result)
            $message = 'Відгук не оцінено';
        echo $message;
    }

    public function uploadAction()
    {
        $this->database->uploadPhoto($this->idTeacher, $this->photo);
        header('Location: ../admin');
    }

    public function exitAction()
    {
        session_start();
        unset($_SESSION['id']);
        session_destroy();
        header('Location: ../');
    }
}