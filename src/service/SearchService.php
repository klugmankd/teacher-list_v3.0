<?php

namespace service\search;


use ORM;

class SearchService
{

    public function findBySubject($subject)
    {
        $teachers = ORM::forTable('teachers_with_subjects')
            ->join('teachers',
                'teachers_with_subjects.teacher_id = teachers.id_teacher')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->where('teachers_with_subjects.subject_id', $subject)
            ->orderByAsc('full_teacher_name')
            ->find_many();
        return $teachers;
    }

    public function findByInstitution($institution)
    {
        $teachers = ORM::forTable('teachers')
            ->join('educational_institution',
                'teachers.ei_id = educational_institution.id_ei')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->where('teachers.ei_id', $institution)
            ->orderByAsc('full_teacher_name')
            ->find_many();
        return $teachers;
    }

    public function findByRank($rank)
    {
        $teachers = ORM::forTable('teachers')
            ->join('teaching_rank',
                'teachers.rank_id = teaching_rank.id_rank')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->where('teachers.rank_id', $rank)
            ->orderByAsc('full_teacher_name')
            ->find_many();
        return $teachers;
    }

    public function findBySubjectAndInstitution($subject, $institution)
    {
        $teachers = ORM::forTable('teachers_with_subjects')
            ->join('teachers',
                'teachers_with_subjects.teacher_id = teachers.id_teacher')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->where('teachers_with_subjects.subject_id', $subject)
            ->where('teachers.ei_id', $institution)
            ->orderByAsc('full_teacher_name')
            ->find_many();
        return $teachers;
    }

    public function findBySubjectAndRank($subject, $rank)
    {
        $teachers = ORM::forTable('teachers_with_subjects')
            ->join('teachers',
                'teachers_with_subjects.teacher_id = teachers.id_teacher')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->where('teachers_with_subjects.subject_id', $subject)
            ->where('teachers.rank_id', $rank)
            ->orderByAsc('full_teacher_name')
            ->find_many();
        return $teachers;
    }

    public function findByInstitutionAndRank($institution, $rank)
    {
        $teachers = ORM::forTable('teachers')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->where('teachers.ei_id', $institution)
            ->where('teachers.rank_id', $rank)
            ->orderByAsc('full_teacher_name')
            ->find_many();
        return $teachers;
    }

    public function findBySubjectAndInstitutionAndRank($subject, $institution, $rank)
    {
        $teachers = ORM::forTable('teachers')
            ->join('teachers_with_subjects',
                'teachers.id_teacher = teachers_with_subjects.teacher_id')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->where('teachers_with_subjects.subject_id', $subject)
            ->where('teachers.ei_id', $institution)
            ->where('teachers.rank_id', $rank)
            ->orderByAsc('full_teacher_name')
            ->find_many();
        return $teachers;
    }

    public function findByName($name)
    {
        $teachers = ORM::forTable('teachers')
            ->join('teacher_position',
                'teachers.position_id = teacher_position.id_position')
            ->whereLike('full_teacher_name', "%$name%")
            ->findMany();
        return $teachers;
    }

}