<head>
<link rel="stylesheet" href="CSS/track.css">
</head>
<?php
include('connect.php');

?>
<div class="main">
<ul >
    <li>
      <p>Item accepted by Courier</p>
        <div class="Progress one">
          
            <i class="fa fa-check"></i>
        </div>
     
    </li>
    <li>
        <p> Package Collected</p>
        <div class="Progress two">
       
            <i class="fa fa-check"></i>
        </div>
        
    </li>
    <li> 
        <p> Package Shipped </p>
        <div class="Progress three">
            
            <i class="fa fa-check"></i>
        </div>
       

    </li>
    <li>
        <p>Package In-Transit </p>
    
        <div class="Progress four">
           
            <i class="fa fa-check"></i>
        </div>
       

    </li>
    <li>  <p> Delivered</p>
        <div class="Progress five">
        
            <i class="fa fa-check"></i>
        </div>
      

    </li>
</ul>
<?php
$packid = $_POST['userid']; 

?>     
  
</div>
<script>
   
var x =  "<?php echo"$packid"?>"; 


const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");
const five = document.querySelector(".five");
if(x=="Item accepted by Courier")


{
one.classList.add("active");
two.classList.remove("active");
three.classList.remove("active");
four.classList.remove("active");
five.classList.remove("active");
}

if(x=="Collected")
{
one.classList.add("active");
two.classList.add("active");
three.classList.remove("active");
four.classList.remove("active");
five.classList.remove("active");
}
if(x=="Shipped") {
one.classList.add("active");
two.classList.add("active");
three.classList.add("active");
four.classList.remove("active");
five.classList.remove("active");
}
if(x=="In-Transit") {
one.classList.add("active");
two.classList.add("active");
three.classList.add("active");
four.classList.add("active");
five.classList.remove("active");
}
if(x=="Delivered") {
one.classList.add("active");
two.classList.add("active");
three.classList.add("active");
four.classList.add("active");
five.classList.add("active");
}

</script>