<!DOCTYPE html>
<html lang="en">
<head>    <title>Animated Step Progress Bar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        
    }
    main{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: pop;
        flex-direction: column;
        background-color: aqua;
     
    

    }
    ul{
        margin-top: 10%;

    }
    ul li{
        list-style: none;
        display: flex;
        flex-direction: column;
        align-items: center;
    
    }
    
ul li .Progress{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: rgba(68, 68, 68, 0.781);
    margin-bottom: 55px;
    margin-top: 25px;
    margin-right: 14px;
    
    display: grid;
    place-items: center;
    color: #fff;
    position: relative;
    cursor: pointer;
    align-content: center;
}
.Progress::after{
    content: " ";
    position: absolute;
    width: 5px;
    height:80px;
    background-color: rgba(68, 68, 68, 0.781);bottom: 30px;
 
 

}
.one::after{
    width: 0;
    height: 0;
}
ul li .Progress .fa{
    display: none;
}
ul li p{
    margin-left: 20%;
  
    position: absolute;
    padding-top: 30px;
    font-weight: bold;
}
ul li .Progress p{
    font-size: 13px;
    padding: 0;
    text-align: center;
  
    
}

/* Active Css  */

ul li .active{
    background-color: #603cef;
    display: grid;
    place-items: center;
}
li .active::after{
    background-color: #603cef;
}
ul li .active p{
    display: none;
}
ul li .active .fa{
    font-size: 20px;
    display: flex;
}

/* Responsive Css  */

@media (max-width: 980px) {
    ul{
        flex-direction: column;
    }
    ul li{
        flex-direction: row;
    }
    ul li .Progress{
        margin: 0 30px;
    }
    .Progress::after{
        width: 5px;
        height: 55px;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: -1;
    }
    .one::after{
        height: 0;
    }
    ul li .icon{
        margin: 15px 0;
    }
}

/* Responsive Css  */


 </style>
</head>
<body>
<div class="main">
    <ul>
        <li>
          <p>Order Picked UP</p>
            <div class="Progress one">
                <p>1</p>
                <i class="fa fa-check"></i>
            </div>
         
        </li>
        <li>
            <p>Order Confirmed</p>
            <div class="Progress two">
                <p>2</p>
                <i class="fa fa-check"></i>
            </div>
            
        </li>
        <li>
            <p>Order Reached at nearest Branch </p>
            <div class="Progress three">
                <p>3</p>
                <i class="fa fa-check"></i>
            </div>
           

        </li>
        <li>
            <p>Out for Dilevery </p>
            <p style="padding-top:0px";> Dilevered</p>
            <div class="Progress four">
                <p>4</p>
                <i class="fa fa-check"></i>
            </div>
           

        </li>
        <li>  <p> Dilevered</p>
            <div class="Progress five">
                <p>5</p>
                <i class="fa fa-check"></i>
            </div>
          

        </li>
    </ul>
</div>
<script>
       
    var x = "two";
   

const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");
const five = document.querySelector(".five");
if(x=="one")


 {
    one.classList.add("active");
    two.classList.remove("active");
    three.classList.remove("active");
    four.classList.remove("active");
    five.classList.remove("active");
}

if(x=="two")
 {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.remove("active");
    four.classList.remove("active");
    five.classList.remove("active");
}
if(x=="three") {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.remove("active");
    five.classList.remove("active");
}
if(x=="four") {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.add("active");
    five.classList.remove("active");
}
if(x=="five") {
    one.classList.add("active");
    two.classList.add("active");
    three.classList.add("active");
    four.classList.add("active");
    five.classList.add("active");
}

</script>
</body>
</html>