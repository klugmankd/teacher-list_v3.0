<?php


use service\database\DatabaseService;

require_once ('src/service/DatabaseService.php');

class CommentController
{

    private $database;
    private $id;
    private $content;
    private $author;

    function __construct()
    {
        $this->database = new DatabaseService();
        $this->id = $_GET['id'];
        $this->content = $_POST['content'];
        $this->author = $_POST['author'];
    }

    public function createAction()
    {
        $this->database->createComment($this->content, $this->author);
        echo "Відгук відправлено";
    }

    public function delete()
    {

    }
}