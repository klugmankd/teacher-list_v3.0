<?php

use service\database\DatabaseService;
use service\search\SearchService;
use service\validator\ValidationService;

require_once ('src/service/SearchService.php');
require_once ('src/service/ValidationService.php');
require_once ('src/service/DatabaseService.php');

class SearchController
{

    private $subject;
    private $institution;
    private $rank;
    private $fullName;
    private $search;
    private $database;

    public function __construct()
    {
        $this->search = new SearchService();
        $this->database = new DatabaseService();
        $this->subject = $_GET['subject'];
        $this->institution = $_GET['institution'];
        $this->rank = $_GET['rank'];
        $this->fullName = $_GET['fullName'];
    }

    public function subjectAction()
    {
        $teachers = $this->search->findBySubject($this->subject);
        foreach ($teachers as $teacher)
            require('app/Resources/view/teacherItemTemplate.php');
    }

    public function institutionAction()
    {
        $teachers = $this->search->findByInstitution($this->institution);
        foreach ($teachers as $teacher)
            require('app/Resources/view/teacherItemTemplate.php');
    }

    public function rankAction()
    {
        $teachers = $this->search->findByRank($this->rank);
        foreach ($teachers as $teacher)
            require('app/Resources/view/teacherItemTemplate.php');

    }

    public function subjectAndInstitutionAction()
    {
        $teachers = $this->search->findBySubjectAndInstitution($this->subject, $this->institution);
        foreach ($teachers as $teacher)
            require('app/Resources/view/teacherItemTemplate.php');
    }

    public function subjectAndRankAction()
    {
        $teachers = $this->search->findBySubjectAndRank($this->subject, $this->rank);
        foreach ($teachers as $teacher)
            require('app/Resources/view/teacherItemTemplate.php');
    }

    public function institutionAndRankAction()
    {
        $teachers = $this->search->findByInstitutionAndRank($this->institution, $this->rank);
        foreach ($teachers as $teacher)
            require('app/Resources/view/teacherItemTemplate.php');
    }

    public function subjectAndInstitutionAndRankAction()
    {
        $teachers = $this->search->findBySubjectAndInstitutionAndRank($this->subject, $this->institution, $this->rank);
        foreach ($teachers as $teacher)
            require('app/Resources/view/teacherItemTemplate.php');
    }

    public function nameAction()
    {
        $teachers = $this->search->findByName($this->fullName);
        foreach ($teachers as $teacher)
            include('app/Resources/view/teacherItemTemplate.php');
    }

    public function nullAction()
    {
        if ($_GET['arg'] == 0)
            echo "Результати пошуку";
    }
}