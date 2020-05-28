<?php
require "connection.php";
require "inc/groups.php";
require "inc/teachers.php";
require "inc/auditories.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Первый Вариант</title>
</head>
<body>
    <section class="container">
        
        <!-- Первое задание -->
        <h5>Расписание произвольной группы из списка</h5>
        <form action="forms/lessons-by-student.php" class="form-group">
            <select name="group">
                <?php
                    foreach ($groups as $group) {
                        echo "<option value=\"". $group['id'] ."\">". $group['title'] ."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Отправить">
        </form>
        <!--   -->


        <!--  Второе задание  -->
        <h5>Расписание произвольного преподавателя из списка.</h5>
        <form action="forms/lessons-by-teacher.php" class="form-group">
            <select name="teacher">
                <?php
                foreach ($teachers as $teacher) {
                    echo "<option value=\"". $teacher['id'] ."\">". $teacher['name'] ."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Отправить">
        </form>
        <!--    -->

        <!--  Третье задание  -->
        <h5>Расписание по аудитории из списка.</h5>
        <form action="forms/lessons-by-auditorium.php" class="form-group">
            <select name="auditorium">
                <?php
                foreach ($auditoriums as $auditorium) {
                    echo "<option value=\"". $auditorium ."\">". $auditorium ."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Отправить">
        </form>
        <!--  -->

    
        <!--  Четвертое задание  -->
        <h5>Добавление практического занятия.</h5>
        <form action="forms/add-lesson.php" class="form-group">
            <select name="group">
                <?php
                    foreach ($groups as $group) {
                        echo "<option value=\"". $group['id'] ."\">". $group['title'] ."</option>";
                    }
                ?>
            </select>
            <select name="teacher">
                <?php
                foreach ($teachers as $teacher) {
                    echo "<option value=\"". $teacher['id'] ."\">". $teacher['name'] ."</option>";
                }
                ?>
            </select>
            <input type="text" placeholder="День недели" name="week_day">
            <input type="number" placeholder="Номер пары" name="lesson_number">
            <input type="text" placeholder="Аудитория" name="auditorium">
            <input type="text" placeholder="Дисциплина" name="disciple">
            
            <input type="submit" value="Отправить">
        </form>
        <!--  -->
    





    </section>
</body>
</html>