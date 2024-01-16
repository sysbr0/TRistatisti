<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SVG Türkiye Haritası</title>
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">

   
    <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
</head>



<body>
<?php
include('in.php');
?>
<style> 
  body {
        background: url('img/arkaplan.jpg') no-repeat center center fixed;
        background-size: cover;
    }
    *{
    padding: 0;
    margin: 0;
    font-family:'Josefin Sans' , sans-serif;
    box-sizing: border-box;
}

.about{
    width: 100px;
    height: 930px;
    padding-top: 200px;
    margin-left: 550px;
    
}
.about img{
    height: auto;
    width: 220px;
   margin-left: 150px;
}

.about text{
    margin-left: 30px;
    width: 550px;
    
}
.main{
    width: 1130px;
    max-width: 50%;
    
     margin: 0 auto; 
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.about-text h1{
    color: #ffff;
    font-size: 60px;
    text-transform: capitalize;
    margin-bottom: 20px;   
}
.about-text h5{
    color: #ffff;
    font-size: 20px;
    text-transform: capitalize;
    margin-bottom: 20px; 
    letter-spacing: 2px; 
}
span{
    color: cadetblue;
}
.about-text p{
    color: #dfd7cf;
    letter-spacing: 1px;
    line-height: 28px;
    font-size: 18px;
    margin-bottom: 45px;
}
button{
    background: #cab486;
    color: #fff;
    text-decoration: none;
    border: 2px solid transparent;
    font-weight: bold;
    padding: 13px 30px;
    border-radius: 30px;
    transition: .4s;
}
button:hover{
    background: transparent;
    border: 2px solid #cab486;
    cursor: pointer;
}
    </style>
    <div class="about">
        <div class="main">
            <img src="img/logog.png"> <img/>
            <div class="about-text">
                <h1>Hakkımızda</h1>
                <h5><span>Tasarımcılar</span></h5>
                <p>"Fırat Üniversitesi 3. sınıf öğrencileri olarak, Veri Tabanı dersi kapsamında 
                    Türkiye istatistik verilerini derleyen bir proje oluşturduk."</p>
                <button type="button">İletişim Geçelim</button>
            </div>
        </div>


</body>