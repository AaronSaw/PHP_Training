<?php
require "function.php"
//createTable()//you call this function only one time
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kyaw {
            width: 400px !important;
        }
    </style>
</head>

<body>
    <?php
    $countByRoom = [];
    $studentRoom = ['A', 'B', 'C', 'D'];
    $studentName = [];
    $studentAge = [];
    foreach ($studentRoom as $v) {
        array_push($countByRoom, countTotal('students', "room='{$v}'"));
    }
    foreach (students() as $s) {
        array_push($studentAge, $s['age']);
        array_push($studentName, $s['name']);
    }
    ?>

    <div class="kyaw">
        <h1>Line Chart</h1>
        <div class="hla">
            <canvas id="secondChart" width="100%" height="100%"></canvas>
        </div>
        <div class="kyaw">
            <canvas id="myChart" width="100%" height="100%"></canvas>
        </div>
        <div class="kyaw">
            <canvas id="pieChart" width="100%" height="100%"></canvas>
        </div>

        <script src="node_modules/chart.js/dist/chart.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
        <script>
            let studentRoom = <?php echo json_encode($studentRoom); ?>;
            let studentNo = <?php echo json_encode($countByRoom); ?>;
            const cx = document.getElementById('secondChart');
            constsecondChart = new Chart(cx, {
                type: 'bar',
                data: {
                    labels: studentRoom,
                    datasets: [{
                        label: 'room of students',
                        data: studentNo,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: true,
                        tension: 0
                    }, ]
                },
                options: {
                    scales: {
                        y: {
                            display: true,
                            beginAtZero: true,
                            ticks: {
                                color: 'red',
                                font: {
                                    size: 15,
                                }
                            }
                        },
                        x: {
                            display: true,
                            ticks: {
                                color: 'red',
                                font: {
                                    size: 15,
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            shape: "circle",
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                backgroundColor: 'rgba(255, 159, 64, 1)',
                                color: 'rgba(255, 159, 64, 1)',
                                // This more specific font property overrides the global property
                                font: {
                                    size: 15,
                                },
                            }
                        }
                    }
                }
            });

            //line
            let studentName = <?php echo json_encode($studentName); ?>;
            let studentAge = <?php echo json_encode($studentAge); ?>;
            const ctx = document.getElementById('myChart');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: studentName,
                    datasets: [{
                        label: 'Age of Students',
                        data: studentAge,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: false,
                        tension: 0
                    }, ]
                },
                options: {
                    scales: {
                        y: {
                            display: true,
                            beginAtZero: false,
                            ticks: {
                                color: 'blue',
                                font: {
                                    size: 15,
                                }
                            }
                        },
                        x: {
                            display: true,
                            ticks: {
                                color: 'blue',
                                font: {
                                    size: 12,
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            shape: "circle",
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                backgroundColor: 'rgba(255, 159, 64, 1)',
                                color: 'rgba(255, 159, 64, 1)',
                                // This more specific font property overrides the global property
                                font: {
                                    size: 15,
                                },
                            }
                        }
                    }
                }
            });

            //pie
            //    let studentName = <?php echo json_encode($studentName); ?>;
            //   let studentAge= <?php echo json_encode($studentAge); ?>;
            const xs = document.getElementById('pieChart');
            const pieChart = new Chart(xs, {
                type: 'pie',
                data: {
                    labels: studentName,
                    datasets: [{
                        label: 'Age of Students',
                        data: studentAge,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: true,
                        tension: 0
                    }, ]
                },
                options: {
                    scales: {
                        y: {
                            display: true,
                            beginAtZero: false,
                            ticks: {
                                color: 'green',
                                font: {
                                    size: 15,
                                }
                            }
                        },
                        x: {
                            display: true,
                            ticks: {
                                color: 'green',
                                font: {
                                    size: 15,
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            shape: "circle",
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                backgroundColor: 'rgba(255, 159, 64, 1)',
                                color: 'rgba(255, 159, 64, 1)',
                                // This more specific font property overrides the global property
                                font: {
                                    size: 10,
                                },
                            }
                        }
                    }
                }
            });
        </script>
</body>

</html>
