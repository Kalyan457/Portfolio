<?php  

    function getConnection($dbname) {
        $servername = "localhost";
        $username = "id13938039_kalyan1295";
        $password = "Santosh@1234";
        $mysqlcon = new mysqli($servername, $username, $password, $dbname);
        if ($mysqlcon->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }                
        return $mysqlcon;
    }

    function fetchDataFromDb($query, $dbname) {
        $conn = getConnection($dbname);
        $result = $conn->query($query);   
        $conn->close();
        return $result;
    }


    function UpdateData($query, $dbname) {
        $conn = getConnection($dbname);      
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }     
        $conn->close();    
    }


    function retriveLikes()
    {
        $sql = "SELECT Likes, DisLikes FROM PROJECT_Like_Dislike ORDER BY ProjectID";
        $result = fetchDataFromDb($sql, 'id13938039_utd');
        $data=array();
        
        if($result->num_rows > 0)
        {
             $i =0;
            while($row = $result->fetch_assoc())
            {
                $data[$i]['likes']  = $row['Likes'];
                $data[$i]['dislikes']  = $row['DisLikes'];
                $i++;
            }
        }
        else
        {
            $data['likes']  = 0;
            $data['dislikes']  = 0;
        }

        return $data;
    }

    function updateLikes($projectname,$likes, $dislikes)
    {
        $sql = "UPDATE PROJECT_Like_Dislike set Likes=$likes , DisLikes=$dislikes where ProjectName='".$projectname."'";
        $result = fetchDataFromDb($sql, 'id13938039_utd');
        if($result === TRUE)
        {
            echo 'yes';
        }
        else
        {
            echo 'no';
        }
    }


    if($_POST['request'] == 2)
    {
        updateLikes($_POST['projectname'], $_POST['likes'], $_POST['dislikes']);
    }
    
?>