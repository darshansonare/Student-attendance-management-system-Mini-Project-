<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/attendanceapp1/database/database.php";
function clearTable($dbo, $tabName)
{
  $c = "delete from ".$tabName;
  $s = $dbo->conn->prepare($c);
  try {
    $s->execute();
    echo($tabName." cleared");
  } catch (PDOException $oo) {
    echo($oo->getMessage());
  }
}
$dbo = new Database();
$c = "create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50),
    email_id varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>student_details created");
} catch (PDOException $o) {
  echo ("<br>student_details not created");
}

$c = "create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_details created");
} catch (PDOException $o) {
  echo ("<br>course_details not created");
}


$c = "create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>faculty_details created");
} catch (PDOException $o) {
  echo ("<br>faculty_details not created");
}


$c = "create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>session_details created");
} catch (PDOException $o) {
  echo ("<br>session_details not created");
}



$c = "create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_registration created");
} catch (PDOException $o) {
  echo ("<br>course_registration not created");
}
clearTable($dbo, "course_registration");

$c = "create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_allotment created");
} catch (PDOException $o) {
  echo ("<br>course_allotment not created");
}
clearTable($dbo, "course_allotment");

$c = "create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>attendance_details created");
} catch (PDOException $o) {
  echo ("<br>attendance_details not created");
}
clearTable($dbo, "attendance_details");

$c = "create table sent_email_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    id int auto_increment primary key,
    message varchar(200),
    to_email varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>sent_email_details created");
} catch (PDOException $o) {
  echo ("<br>sent_email_details not created");
}
clearTable($dbo, "sent_email_details");

clearTable($dbo, "student_details");
$c = "insert into student_details
(id,roll_no,name,email_id)
values

(1,'AM21002','RUCHITA KUMBHARE','abc@gmail.com'),
(2,'AM21003','PRADYUMNA SONEWANE','abc@gmail.com'),
(3,'AM21004','ABOLI WANKHEDE','abc@gmail.com'),
(4,'AM21005','SAGAR BOKADE','abc@gmail.com'),
(5,'AM21006','PRANIL RAUL','abc@gmail.com'),
(6,'AM21007','RITIK MALVIYA','abc@gmail.com'),
(7,'AM21008','PRIYA YADAV','abc@gmail.com'),
(8,'AM21009','PRACHI SONTAKKE','abc@gmail.com'),
(9,'AM21010','PRATHAMESH NAIK','abc@gmail.com'),
(10,'AM21011','KHUSHI TIRPUDE','abc@gmail.com'),
(11,'AM21012','MINAL CHAWARE','abc@gmail.com'),
(12,'AM21013','SWAROOP MASURKAR','abc@gmail.com'),

(13,'AM21014','VAISHNAVI RAHMATKAR','abc@gmail.com'),
(14,'AM21015','ATHARVA WAKDIKAR','abc@gmail.com'),
(15,'AM21016','NAVIN JAMULE','abc@gmail.com'),
(16,'AM21017','MAYUR BHASKAR','abc@gmail.com'),
(17,'AM21018','ROHIT LOTHE','abc@gmail.com'),
(18,'AM21019','PRACHI MOHOD','abc@gmail.com'),
(19,'AM21020','AKSHAY PATIL','abc@gmail.com'),
(20,'AM21021','IVAN JOSEPH','abc@gmail.com'),
(21,'AM21022','SARTHAK YADAV','abc@gmail.com'),
(22,'AM21023','AYUSH KUMAR ROY','abc@gmail.com'),
(23,'AM21024','SUJAL BIAS','abc@gmail.com'),
(24,'AM21025','AKSHATH MAHTO','abc@gmail.com')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "faculty_details");
$c = "insert into faculty_details
(id,user_name,password,name)
values
(1,'Komal','123','Mrs. Komal Parate'),
(2,'Neha','123','Neha Titarmare'),
(3,'Vivek','123','Vivek Chauhan'),
(4,'Alok','123','Alok Chauhan'),
(5,'Mayuri','123','Mayuri Getme'),
(6,'Arpit','123','Arpit Gupta')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "session_details");
$c = "insert into session_details
(id,year,term)
values

(1,2024,'SUMMER SEMESTER')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "course_details");
$c = "insert into course_details
(id,title,code,credit)
values
(1,'Compiler Desgin','AM601T',2),
(2,'Deep Learning','AM602T',3),
(3,'Digital Image & Video Processing','AM603T',4),
(4,'Computer Vision','AM605T',5),
(5,'IoT & Machine Learning','AM606T',6),
(6,'Soft Skills ','AM601P',1)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

//if any record already there in the table delete them
clearTable($dbo, "course_registration");
$c = "insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 24 students
//for each of them chose max 3 random courses, from 1 to 6

for ($i = 1; $i <= 24; $i++) {
  for ($j = 0; $j < 5; $j++) {
    $cid = rand(1,6);
    //insert the selected course into course_registration table for 
    //session 1 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
   // $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 2 and student_id $i
    //try {
    //  $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 2]);
    //} catch (PDOException $pe) {
    //}

    //repeat for session 3
  // $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 2 and student_id $i
    //try {
    //$s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 3]);
    //} catch (PDOException $pe) {
    //}
  }
}


//if any record already there in the table delete them
clearTable($dbo, "course_allotment");
$c = "insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 6 teachers
//for each of them chose max 2 random courses, from 1 to 6

for ($i = 1; $i<= 6; $i++) {
  for ($j = 0; $j<5; $j++) {
    $cid = rand(1,6);
    //insert the selected course into course_allotment table for 
    //session 1 and fac_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
    //$cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 2 and student_id $i
  //  try {
    //  $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 2]);
    //} catch (PDOException $pe) {
    //}

    //repeat for session 3
    //$cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 2 and student_id $i
    //try {
     // $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 3]);
    //} catch (PDOException $pe) {
    //}
  }
}