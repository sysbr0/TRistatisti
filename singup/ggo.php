
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Population Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="css/data.css" rel="stylesheet">


    <link href="css/css.css" rel="stylesheet" />

   
<?php include('cards.php');?>

</head>

<body>

<div id="chartContainer">
    <canvas id="popchart"></canvas>
    <div class="chart-controls">
        
    </div>
</div>

<div id="cityListContainer">
    <ul id="cityList">
        <?php
       
        

    
        $sql = "SELECT * FROM data";  
        $result = $conn->query($sql);

        $data = []; //arrray sql
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'label' => $row['dname'],
                'data' => array_slice($row, 2),  
                'borderColor' => '#' . dechex(rand(0x000000, 0xFFFFFF)), //color
            ];
            echo '<li data-city="' . $row['dname'] . '">' . $row['dname'] . '</li>';
        }

        
        $conn->close();
        ?>
    </ul>
</div>

<script>
var ctx = document.getElementById('popchart').getContext('2d');
var popchart;

// chart
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

// selected city
function updateChart(selectedCity) {
    var newData = <?php echo json_encode($data); ?>.filter(function (cityData) {
        return cityData.label === selectedCity;
    });

    if (popchart) {
        popchart.destroy(); // حذف السابق 
    }

    popchart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: newData,
        },
        options: firstOption,
    });

    // Show chart
    document.getElementById('popchart').style.display = 'block';

    // URL
    updateURL(selectedCity);
}


document.getElementById('cityList').addEventListener('click', function (event) {
    if (event.target.tagName === 'LI') {
        var selectedCity = event.target.getAttribute('data-city');
        updateChart(selectedCity);
    }
});

// up_url
function updateURL(selectedCity) {
    window.history.replaceState({}, document.title, "?dname=" + encodeURIComponent(selectedCity));
}

//url get
function getURLParameter(param) {
    var url = new URLSearchParams(window.location.search);
    return url.get(param);
}


document.addEventListener('DOMContentLoaded', function () {
    var cityParam = getURLParameter('dname');
    if (cityParam) {
       
        updateChart(decodeURIComponent(cityParam));
    }
});




function resetChart() {
    popchart.destroy();
    popchart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [],
        },
        options: firstOption,
    });
    document.getElementById('popchart').style.display = 'none';
}
</script>

</body>
</html>
