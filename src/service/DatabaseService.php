<?php

namespace service\database;

use ORM;

class DatabaseService
{

    public function createTeacher($teacherFields)
    {
        $teacher = ORM::forTable('teachers')->create();

        $teacher->set(array(
            'full_teacher_name' => $teacherFields['name'],
            'ei_id' => $teacherFields['institution'],
            'position_id' => $teacherFields['position'],
            'category_id' => $teacherFields['category'],
            'rank_id' => $teacherFields['rank'],
            'PDD' => $teacherFields['perspectiveTeachingExperience']
        ));

        $teacher->save();
    }

    public function readTeacher($id)
    {
        $teacher = ORM::forTable('teachers_view')
            ->where('id', $id)
            ->findOne();
        return $teacher;
    }

    public function updateTeacher($id, $teacherFields)
    {
        $result = ORM::raw_execute("UPDATE teachers " .
            "SET full_teacher_name = :name,  " .
            "ei_id = :institution, " .
            "position_id = :position, " .
            "category_id = :category, " .
            "rank_id = :rank, " .
            "PDD = :perspectiveTeachingExperience " .
            "WHERE id_teacher = :id",
            array(
                "name" => $teacherFields['name'],
                "institution" => $teacherFields['institution'],
                "position" => $teacherFields['position'],
                "category" => $teacherFields['category'],
                "rank" => $teacherFields['rank'],
                "perspectiveTeachingExperience" => $teacherFields['perspectiveTeachingExperience'],
                "id" => $id,
            )
        );

        return $result;
    }

    public function deleteTeacher($id)
    {
        $teacher = ORM::raw_execute("DELETE FROM teachers " .
            "WHERE id_teacher = :id",
            array(
                "id" => $id,
            )
        );
        return $teacher;
    }

    public function readAllTeachers()
    {
        $teachers = ORM::forTable('teachers')
            ->orderByAsc('full_teacher_name')
            ->findMany();
        return $teachers;
    }

    public function selectAllSubjects()
    {
        $subjects = ORM::forTable('subjects')->findMany();
        return $subjects;
    }

    public function selectAllInstitutions()
    {
        $institutions = ORM::forTable('educational_institution')->findMany();
        return $institutions;
    }

    public function selectAllRanks()
    {
        $ranks = ORM::forTable('teaching_rank')->findMany();
        return $ranks;
    }

    public function selectAllPositions()
    {
        $positions = ORM::forTable('teacher_position')->findMany();
        return $positions;
    }

    public function selectAllCategories()
    {
        $categories = ORM::forTable('category')->findMany();
        return $categories;
    }

    public function selectTeachersSubjects($id)
    {
        $subjects = ORM::forTable('teacher_with_subject_view')
            ->where('id_teach', $id)->findMany();
        $string = "";
        foreach ($subjects as $subject) {
            $string .= $subject->subject . ", ";
        }
        $string = substr($string, 0, -2);
        return $string;
    }

    public function addSubject($teacher, $subject)
    {
        $subjectToTeacher = ORM::forTable('teachers_with_subjects')->create();

        $subjectToTeacher->set(array(
            'teacher_id' => $teacher,
            'subject_id' => $subject
        ));

        $subjectToTeacher->save();
    }

    public function createComment($content, $author)
    {
        $comment = ORM::forTable('comment')->create();

        $comment->set(array(
            'content' => $content,
            'author' => $author
        ));

        $comment->save();

    }

    public function selectCommentsWithLimit($limit)
    {
        $comments = ORM::forTable('comment')
            ->orderByDesc('id')
            ->limit($limit)
            ->where('isApproved', 1)
            ->findMany();
        return $comments;
    }

    public function selectAllNewComments()
    {
        $comments = ORM::forTable('comment')
            ->orderByDesc('id')
            ->where('isApproved', 0)
            ->findMany();
        return $comments;
    }

    public function approveComment($id)
    {
        $result = ORM::raw_execute("UPDATE comment " .
            "SET isApproved = :value " .
            "WHERE id = :id",
            array(
                "value" => 1,
                "id" => $id
            )
        );
        return $result;
    }

    public function disapproveComment($id)
    {
        $result= ORM::raw_execute("DELETE FROM comment " .
            "WHERE id = :id",
            array(
                "id" => $id
            )
        );
        return $result;
    }

    public function readAllAboutOnce($id)
    {
        $teacher = ORM::forTable('teachers')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->join('category',
                'teachers.category_id = category.id_category')
            ->join('teaching_rank',
                'teachers.rank_id = teaching_rank.id_rank')
            ->join('educational_institution',
                'teachers.ei_id = educational_institution.id_ei')
            ->where('id_teacher', $id)
            ->findOne();
        return $teacher;
    }

    public function uploadPhoto($id, $photo)
    {
        if(copy($photo['tmp_name'], 'web/img/profile/'.$photo['name'])) {
            $name = $photo['name'];

            $result = ORM::raw_execute("UPDATE teachers " .
                "SET img_name = :name " .
                "WHERE id_teacher = :id",
                array(
                    "name" => $name,
                    "id" => $id
                )
            );
        }

        return $result;
    }
}