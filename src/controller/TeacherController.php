<?php


use service\database\DatabaseService;

require_once ('src/service/DatabaseService.php');

class TeacherController
{

    private $database;
    private $id;
    private $fullName;
    private $category;
    private $position;
    private $rank;
    private $institution;
    private $ppd;
    private $idTeacher;
    private $subject;

    public function __construct()
    {
        $this->database = new DatabaseService();
        $this->id = $_GET['id'];
        $this->fullName = $_POST['fullName'];
        $this->category = $_POST['category'];
        $this->institution = $_POST['institution'];
        $this->rank = $_POST['rank'];
        $this->position = $_POST['position'];
        $this->ppd = $_POST['ppd'];
        $this->idTeacher = $_POST['idTeacher'];
        $this->subject = $_POST['subject'];
    }

    public function createAction()
    {
        $teacherFields = array(
                'name' => $this->fullName,
                'institution' => $this->institution,
                'position' => $this->position,
                'category' => $this->category,
                'rank' => $this->rank,
                'perspectiveTeachingExperience' => $this->ppd
            );
        $this->database->createTeacher($teacherFields);
        echo "Вчителя створено";
    }

    public function addSubjectAction()
    {
        $this->database->addSubject($this->idTeacher, $this->subject);
        echo "Предмет вчителю додано";
    }

    public function readAction()
    {
        $teacher = $this->database->readTeacher($this->id);
        $subjects = $this->database->selectTeachersSubjects($this->id);
        require_once ('app/Resources/view/profileTemplate.php');
    }

    public function updateAction() {
        $teacherFields = array(
            'name' => $this->fullName,
            'institution' => $this->institution,
            'position' => $this->position,
            'category' => $this->category,
            'rank' => $this->rank,
            'perspectiveTeachingExperience' => $this->ppd
        );
        $result = $this->database->updateTeacher($this->idTeacher, $teacherFields);

        if ($result) {
            echo "ok";
        } else echo "no ok";
    }

    public function deleteAction() {
        $result = $this->database->deleteTeacher($this->idTeacher);
        if ($result)
            echo "ok";
        else
            echo "no ok";
    }

    public function selectAllAction() {
        $teachers = $this->database->readAllTeachers();
        foreach ($teachers as $teacher)
            require ('app/Resources/view/teacherItemTemplate.php');
    }
}