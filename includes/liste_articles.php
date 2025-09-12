<?php
include 'config.php' ;
$conn->set_charset("utf8mb4");
$categorie = isset($_GET['categorie'])?
trim($_GET['categorie']):'';

$rows =[];

if(!empty($categorie)){
    $st = $conn->prepare("SELECT id ,title , content ,image , category FROM articles WHERE category = ? ORDER BY id DESC");
    if($st){
        $st->bind_param("s", $categorie);
        $st->execute();
        $result = $st->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               $rows[] = $row;
            }
        }
        $st->close();
    }
        
}else{
    $result = $conn->query("SELECT id , title , content ,image , category FROM articles ORDER BY id DESC");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    }
}
?>




