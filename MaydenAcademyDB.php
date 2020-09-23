<?php

$db = new PDO ('mysql:host=db; dbname=MaydenAcademy', 'root', 'password');
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$query = $db->prepare('SELECT * FROM `students` INNER JOIN classes ON classes.id = students.classID');
$query->execute();
$students = $query->fetchAll();

/** Function to make a table including various information extracted from $students DB
 *
 * @param string $className
 * @param array  $students
 *
 *  echo table with info completed
 */
function makeATable(string $className, array $students) {
    echo '<table>';
    echo '<tr><th>Student Name</th><th>Age</th><th>Gender</th><th>Desk Number</th></tr>';
    foreach ($students as $item) {
        if ($item['className'] === $className) {
            echo "<tr><td>$item[studentName]</td><td>$item[age]</td><td>$item[gender]</td><td>$item[deskAssignment]</td>";
        }
    }
    echo '</table>';
}

echo '<h1>Pangolin Class</h1>';
makeATable("Pangolins", $students);
echo '<h1>Moss Piglets Class</h1>';
makeATable("Moss Piglets", $students);

//echo '<pre>';
//var_dump($students);
//echo '</pre>';



