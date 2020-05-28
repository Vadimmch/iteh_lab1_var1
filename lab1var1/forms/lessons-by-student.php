<?php
require "../connection.php";


$sqlSelect = "SELECT lesson.week_day, lesson.lesson_number, lesson.auditorium, lesson.disciple, lesson.type FROM `lesson_groups`, `lesson` WHERE `FID_Groups` = :group AND `FID_Lesson2` = lesson.ID_Lesson";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':group' => $_GET['group']));

$cist = array();
foreach ($sth as $index => $row) {
	$cist[] = array(
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
			foreach ($cist as $value) : ?>
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