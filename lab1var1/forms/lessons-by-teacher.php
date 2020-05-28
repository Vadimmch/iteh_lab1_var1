<?php

require "../connection.php";


$sqlSelect = "SELECT lesson.week_day, lesson.lesson_number, lesson.auditorium, lesson.disciple, lesson.type FROM `teacher`, `lesson_teacher`, `lesson` WHERE teacher.ID_Teacher = :teacherID AND lesson_teacher.FID_Teacher = teacher.ID_Teacher and lesson.ID_Lesson = lesson_teacher.FID_Lesson1";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':teacherID' => $_GET['teacher']));

$lessons = array();
foreach ($sth as $index => $row) {
	$lessons[] = array(
		'week_day' => $row['week_day'],
		'lesson_number' => $row['lesson_number'],
		'auditorium' => $row['auditorium'],
		'disciple' => $row['disciple'],
		'type' => $row['type']
	);
}
?>

<table>
	<thead>
		<tr>
			<th>День недели</th>
			<th>Номер пары</th>
			<th>Аудитория</th>
			<th>Дисциплина</th>
			<th>Тип занятия</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($lessons as $value) : ?>
				<tr>
					<td><?php echo $value['week_day']; ?></td>
					<td><?php echo $value['lesson_number']; ?></td>
					<td><?php echo $value['auditorium']; ?></td>
					<td><?php echo $value['disciple']; ?></td>
					<td><?php echo $value['type']; ?></td>
				</tr>
			<?php endforeach; ?>
	</tbody>
</table>