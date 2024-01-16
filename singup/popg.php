
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Population Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php include('in.php'); ?>
    

 
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
        
</head>

<body>
<style>
        body {
            margin: 50;
            padding: 0;
         
            align-items: flex-start;
            justify-content: flex-start;
            height: 100vh;
            background: url('img/arkaplan.jpg') no-repeat center center fixed;
        background-size: cover;
        }
    </style>

<div id="chartContainer">
    <canvas id="popchart"></canvas>
    <div class="chart-controls">
        
    </div>
</div>

<div id="cityListContainer">
    <ul id="cityList">
        <?php
       
        

       
        $sql = "SELECT * FROM pop";  
        $result = $conn->query($sql);

        $data = []; //arrray
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'label' => $row['city'],
                'data' => array_slice($row, 2), 
                'borderColor' => '#' . dechex(rand(0x000000, 0xFFFFFF)),
            ];
            echo '<li data-city="' . $row['city'] . '">' . $row['city'] . '</li>';
        }

        $conn->close();
        ?>
    </ul>
</div>

<script>
var ctx = document.getElementById('popchart').getContext('2d');
var popchart;


var firstOption = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        x: {
            type: 'linear',
            position: 'bottom',
        },
        y: {
            type: 'linear',
            position: 'left',
        },
    },
};

function updateChart(selectedCity) {
    var newData = <?php echo json_encode($data); ?>.filter(function (cityData) {
        return cityData.label === selectedCity;
    });

    if (popchart) {
        popchart.destroy(); // حذف السابق 
    }
// new chart 
    popchart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["2000", "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: newData,
        },
        options: firstOption,
    });

    document.getElementById('popchart').style.display = 'block';

    // URL
    updateURL(selectedCity);
}

//change cıty 
document.getElementById('cityList').addEventListener('click', function (event) {
    if (event.target.tagName === 'LI') {
        var selectedCity = event.target.getAttribute('data-city');
        updateChart(selectedCity);
    }
});

// up_url
function updateURL(selectedCity) {
    window.history.replaceState({}, document.title, "?city=" + encodeURIComponent(selectedCity));
}

/// url generator
function getURLParameter(param) {
    var url = new URLSearchParams(window.location.search);
    return url.get(param);
}


document.addEventListener('DOMContentLoaded', function () {
    var cityParam = getURLParameter('city');
    if (cityParam) {
        
        updateChart(decodeURIComponent(cityParam));
    }
});



// Reset chart 
function resetChart() {
    popchart.destroy();
    popchart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["2000", "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [],
        },
        options: firstOption,
    });
    // عرض 
    document.getElementById('popchart').style.display = 'none';
}
</script>

</body>
</html>
