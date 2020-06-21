<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function notFound(){
        swal({
            title: "Email not found!",
            text: "Please register",
            icon: "error",
            button: "Register",
        }).then((value)=>{
            if(value){
                window.location.href = "form.html";
            }
            else{
                window.location.href = "form.html";
            }
        });
    }

    function success(){
        swal("Thanks for your participation!", "Attend other events", "success").then((value)=>{
            if(value){
                window.location.href = "index.html";
            }
            else{
                window.location.href = "index.html";
            }
        });
    }

</script>
<?php
require 'conn.php';

if(isset($_POST['submit']))
{
    $score = 0;
    $email = $_POST['email'];
    $s1 = strtolower(str_replace(" ","",$_POST['story1']));
    $s2 = strtolower(str_replace(" ","",$_POST['story2']));
    $s3 = strtolower(str_replace(" ","",$_POST['story3']));
    $s4 = strtolower(str_replace(" ","",$_POST['story4']));
    $s5 = strtolower(str_replace(" ","",$_POST['story5']));
    $responsearr = array($s1,$s2,$s3,$s4,$s5);
}

function calculateScore($responsearr){
    $ansarr = array("STRUCTURE", "DYNAMIC MEMORY ALLOCATION", "FUNCTION", "SWITCH", "CONTINUE");
    $score = 0;
    for ($i=0; $i < 5; $i++) { 
        if($responsearr[$i] == strtolower(str_replace(" ","",$ansarr[$i])))
        {
            $score+=20;
        }
    }
    return $score;
}

$sql = "SELECT email FROM registration WHERE email = '$email'";

$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res) > 0)
{
    $row = mysqli_fetch_assoc($res);
    $finalscore = calculateScore($responsearr);
    $update = "UPDATE registration SET e1 = '$finalscore' WHERE email = '$email'";
    if(mysqli_query($conn, $update)){
        echo '<script>setTimeout(function(){ success(); }, 0);</script>';
    }
}

else{
    echo '<script>setTimeout(function(){ notFound(); }, 0);</script>';
}

if(!$conn){
    echo 'Error: '. mysqli_error($conn);
}

mysqli_close($conn);
?>