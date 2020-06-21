<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script language="javascript">
    function sweet(){
        swal("Registered successfully!", "Thanks you!", "success").then((value)=>{
            if(value){
                window.location.href = "index.html";
            }
            else{
                window.location.href = "index.html";
            }
        });
    }   
    function exist(){
        swal("Email already found!", "Use new email","warning").then((value) =>{
            if(value){
                window.location.href = "form.html";
            }
            else{
                window.location.href = "form.html";
            }
        })
    }
</script>
<?php
define('CDN', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');
include 'conn.php';

if(isset($_POST['submit'])){

    $fname = $_POST['uname'];
    $email = $_POST['email'];
    $years = $_POST['years'];
    $rno = $_POST['rno'];
    $dept = $_POST['dept'];
}

$sql = "SELECT email FROM registration WHERE email = '$email'";

$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res) > 0)
{
    echo '<script>setTimeout(function(){ exist(); }, 0);</script>';
}
else {
    $sql = "INSERT INTO registration (fname,email, years, rollno, dept) VALUES ('$fname','$email','$years','$rno','$dept')";    
    
    if (mysqli_query($conn, $sql)) {
        echo '<script>setTimeout(function(){ sweet(); }, 0);</script>';
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

mysqli_close($conn);

?>