<?php 
include 'htmlPart.php'; 

/************************************************************************************/
function sqlSingle($conn, $sql){
    if ($_SESSION['debug']){print $sql;};

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_array($result, MYSQLI_NUM); 
       return $row[0];
        } 
}

/************************************************************************************/
function sqlQuery($conn, $sql){
    if ($_SESSION['debug']){print $sql;};
    mysqli_query($conn, $sql)
    or die(mysqli_error($conn));
}

/************************************************************************************/
function sqlTab($conn, $sql){
    if ($_SESSION['debug']){print $sql;};

    $result = mysqli_query($conn, $sql);
    $ret='<table  border=1>';

    $ret=$ret."<tr>";
    while ($finfo = mysqli_fetch_field($result)) {
        $ret=$ret."<td>".$finfo->name."</td>";
    }

    $ret=$ret."</tr><tr>";

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        $ret=$ret."<tr>";
            for($i = 0; $i < sizeof($row);$i++)
                $ret=$ret."<td>".$row[$i]."</td>";
        $ret=$ret."</tr>";
        }     
    }
return $ret."</table>";
}


/************************************************************************************/

function sqlTabjQuery($conn, $sql, $Titre1 = " - ", $Titre2 = " - "){
if ($_SESSION['debug']){print $sql;};

$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

$ret=$ret.partHtml('tabJQueryHeader1').$Titre1.partHtml('tabJQueryHeader2').$Titre2.partHtml('tabJQueryHeader3');

while ($finfo = mysqli_fetch_field($result)) {
    $ret=$ret . '<th>' . $finfo->name . '</th>';
}

$ret=$ret.partHtml('tabJQueryHeader4');

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        $ret=$ret.partHtml('tabJQueryCol1');        
        for($i = 0; $i < sizeof($row);$i++) {
            $ret=$ret."<td>".$row[$i]."</td>";
        }
        $ret=$ret.partHtml('tabJQueryCol2');        
    }     
}

$ret=$ret.partHtml('tabJQueryFooter1');
return $ret;
}



/************************************************************************************/
function sqlTab2($conn, $sql){
if ($_SESSION['debug']){print $sql;};

$result = mysqli_query($conn, $sql);

$ret=$ret.'<table border=1>';
while ($finfo = mysqli_fetch_field($result)) {
    $ret=$ret.'<th>'.$finfo->name.'</th>';
}

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        $ret=$ret.'<tr>';
        for($i = 0; $i < sizeof($row);$i++) {
            $ret=$ret.'<td>'.$row[$i].'</td>';
        }
        $ret=$ret.'</tr>';
    }     
}
return $ret."</table>";
}
/************************************************************************************/



function sqlTabJQ($conn, $sql){
return boutHtml('JQtab1');
}

/************************************************************************************/

function sqlTabLg($conn, $sql){

$result = mysqli_query($conn, $sql);

$i=0;
while ($finfo = mysqli_fetch_field($result)) {
    $name[$i++]=$finfo->name;
}

$ret="";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    $ret=$ret."<table  border=1>";
        for($i = 0; $i < sizeof($row);$i++)
            $ret=$ret."<tr><td>".$name[$i]."</td><td>".$row[$i]."</td>";        
    $ret=$ret."</table>";
        
}
return $ret;
}
}


?>
