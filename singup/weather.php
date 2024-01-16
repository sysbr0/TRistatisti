<! DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SVG Türkiye Haritası</title>
    <link href="css/css.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">

   
    <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   
    <script src="js/svg-turkiye-haritasi.js" defer></script>

<link rel="stylesheet" href="css/wether.css">
</head>

  </head>
<body>

<button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there 👋<br>How can I help you today?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>

  <?php
include('in.php');
?>


<style> 
body {
    background: url('img/arkaplan.jpg') no-repeat center center fixed;
    background-size: cover;
 
}
.svg-turkiye-haritasi {
max-width: 940px;

height: 120vh;
margin: 0 auto;
text-align: center;
margin-right: 200px;
}


    </style>
    
    <?php
include('inc/map00.php');
?>
 

 <?php
include('chat/chat.php');
?>


</div>
<div class="app">
<div class="header">
<h1>Hava Durumu</h1>

</div>


<div class="content">
<div class="city">Istanbul, TR</div>
<div class="temp">15℃</div>
<div class="desc">Gunesli</div>
<div class="minmax">14c / 19c</div>
</div>
</div>

<script src="js/wether.js"></script>


<script src="js/svg-turkiye-haritasi.js"></script>
    <script>
      svgturkiyeharitasi();
    </script>

</body>
</html>