<?php
require '../connection.php';

try {

	$prevID = "SELECT  ID_Lesson FROM lesson WHERE ID_Lesson=(SELECT MAX(ID_Lesson) FROM lesson)";

	$sth = $dbh->prepare($prevID, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute();
	$prevID = 0;
	foreach ($sth as $value) {

		$prevID = (int)$value['ID_Lesson'];
	}

	$insertLesson = "INSERT INTO lesson (ID_Lesson, week_day,lesson_number, auditorium, disciple, type) VALUES (?,?,?,?,?,?)";
	$insertTeacherRel = "INSERT INTO lesson_teacher (FID_Teacher, FID_Lesson1) VALUES (?,?)";
	$insertGroupRel = "INSERT INTO lesson_groups (FID_Lesson2, FID_Groups) VALUES (?,?)";





	$lesson_insert 		= $dbh->prepare($insertLesson);
	$teacher_insert 	= $dbh->prepare($insertTeacherRel);
	$group_insert 		= $dbh->prepare($insertGroupRel);
	if ($lesson_insert->execute([$prevID+1,$_GET['week_day'],$_GET['lesson_number'], $_GET['auditorium'], $_GET['disciple'], 'Practical'])
		&&
		$teacher_insert->execute([$_GET['teacher'],$prevID+1])
		&&
		$group_insert->execute([$prevID+1, $_GET['group'],])
	) {
		echo "Практическое занятие успешно добавлено";
	} else {
		echo "Ошибка!";
	}
} catch (Exception $e) {
	echo $e;
}
