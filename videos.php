<?php
    $_POST['request'] = 0;
    include 'dbaccess.php';
    $data = retrivelikes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Demos</title>
    <link rel="stylesheet" href="videoStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <a href="index.html">Home</a>
        <a href="index.html#AboutMe">About Me</a>
        <a href="index.html#Academics">Academics</a>
        <a href="index.html#WorkEx">Work Experience</a>
        <a href="projects.html">Projects</a>
        <a href="index.html#Hobby">Hobbies</a>
        <a href="index.html#Contact">Contact</a>
    </div>
    <div id="p1">
        <div id="project1">
            <h3 name="">
                Contact List Application
            </h3>
            <video width="720" height="460" controls>
                <source src="contactListApp.mp4" type="video/mp4">
              Your browser does not support the video tag.
              </video>
        </div>
        <div id="project1LikeDislike">
            <span id="likeP1"> <?php echo $data[0]['likes']; ?> </span><i onclick="handleLikesP1()" class="fa fa-thumbs-up"></i>
            <span id="dislikeP1"> <?php echo $data[0]['dislikes']; ?> </span><i onclick="handleDisLikesP1()" class="fa fa-thumbs-down"></i>
        </div>
    </div>
    <div id="p2">
        <div id="project2">
            <h3>
                Quick Quiz
            </h3>
            <video width="720" height="360" controls>
                <source src="QuizApp.mp4" type="video/mp4">
              Your browser does not support the video tag.
              </video>
        </div>
        <div id="project2LikeDislike">
            <span id="likeP2"><?php echo $data[1]['likes']; ?></span><i onclick="handleLikesP2(this)" class="fa fa-thumbs-up"></i>
            <span id="dislikeP2"><?php echo $data[1]['dislikes']; ?></span><i  onclick="handleDisLikesP2(this)" class="fa fa-thumbs-down"></i>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script>
        
        $(document).ready(
           
            function(){
                var likeP1=document.getElementById("likeP1");
                var dislikeP1=document.getElementById("dislikeP1");

                var likeP2=document.getElementById("likeP2");
                var dislikeP2=document.getElementById("dislikeP2");
          /*      $.post("dbaccess.php",
                {
                    request: 1 
                },
                function(data)
                {
                    var myObj = JSON.parse(data);
                    likeP1.innerText = myObj[0].likes;
                    dislikeP1.innerText = myObj[0].dislikes;

                    likeP2.innerText = myObj[1].likes;
                    dislikeP2.innerText = myObj[1].dislikes;
                }
                );*/
                
            }
        );
    </script>
    <script>
        function handleLikesP1(){
            likeP1.innerText=parseInt(likeP1.innerText)+1;
            var likeP1Val=likeP1.innerText;
          
            $.post("dbaccess.php",
                {
                    request: 2,
                    projectname: 'Contact List Application',
                    likes:  likeP1.innerText,
                    dislikes: dislikeP1.innerText
                },
                function(data)
                {
                    if(data == 'no')
                        alert('update failed');
                }
                );
        }

        function handleDisLikesP1(){
            dislikeP1.innerText=parseInt(dislikeP1.innerText)+1;
            var dislikeP1Val=dislikeP1.innerText;
            $.post("dbaccess.php",
                {
                    request: 2,
                    projectname: 'Contact List Application',
                    likes:  likeP1.innerText,
                    dislikes: dislikeP1.innerText
                },
                function(data)
                {
                    if(data == 'no')
                        alert('update failed');
                }
                );
        }

        function handleLikesP2(){
            likeP2.innerText=parseInt(likeP2.innerText)+1;
            $.post("dbaccess.php",
                {
                    request: 2,
                    projectname: 'Quick Quiz',
                    likes:  likeP2.innerText,
                    dislikes: dislikeP2.innerText
                },
                function(data)
                {
                    if(data == 'no')
                        alert('update failed');
                }
                );
        }

        function handleDisLikesP2(){
            dislikeP2.innerText=parseInt(dislikeP2.innerText)+1;
            $.post("dbaccess.php",
                {
                    request: 2,
                    projectname: 'Quick Quiz',
                    likes:  likeP2.innerText,
                    dislikes: dislikeP2.innerText
                },
                function(data)
                {
                    if(data == 'no')
                        alert('update failed');
                }
                );
        }
    </script>
</body>
</html>