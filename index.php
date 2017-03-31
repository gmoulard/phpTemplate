<?php include 'headeur.php';
?>
						    
<?php 
print sqlTabjQuery($conn , 'SELECT  concat ("<a href=\"eventForOneDate.php?d=",dateScript,"\">", dateScript, "</a>") date, 
                                    cloud,  
                                    count(nbr_pbs) nbr_pbs , 
                                    concat ("<a href=\"viewFullData.php?d=",dateScript,"&c=",cloud,"\">viewFullData </a>") full 
                            FROM eventList 
                            group by dateScript, cloud
                            order by dateScript desc',
                    "Last event fetch: ".sqlSingle($conn, "SELECT Max(dateScript) FROM eventList") ,
                    "List fetch") ;                         
                    
include 'footeur.php'; ?>
