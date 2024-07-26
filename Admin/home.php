<?php
$page_title = "Homepage";
require('inc/header.php');

// Database connection

// Fetch user count
$user_count_query = "SELECT COUNT(*) as user_count FROM `userData`";
$user_count_result = $conn->query($user_count_query);
$user_count = $user_count_result->fetch_assoc()['user_count'];

// Fetch booking count and net income
$booking_query = "SELECT COUNT(*) as booking_count, SUM(totalprice) as net_income FROM `booking`";
$booking_result = $conn->query($booking_query);
$booking_data = $booking_result->fetch_assoc();
$booking_count = $booking_data['booking_count'];
$net_income = $booking_data['net_income'];

// Fetch random admin info (example: admin tips)
$admin_tips = [
    "Tip 1: Regularly update your software.",
    "Tip 2: Monitor your system for any unusual activity.",
    "Tip 3: Backup your data frequently.",
    "Tip 4: Use strong passwords and update them regularly.",
    "Tip 5: Train staff on security best practices."
];
$random_tip = $admin_tips[array_rand($admin_tips)];
?>

<div class="main-content">
    <div class="container-fluid">
        <div class="welcome-text mb-4">
          
            <h2 class="fw-bold text-center text-light p-2 bg-danger mb-3">Welcome to Admin dashboard</h2>

        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Numbers</h4>
                        <p class="card-text"><?php echo $user_count; ?> users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Booking Numbers</h4>
                        <p class="card-text"><?php echo $booking_count; ?> bookings</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Net Income</h4>
                        <p class="card-text">$<?php echo number_format($net_income, 2); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Growth</h4>
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Income Over Time</h4>
                        <canvas id="incomeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Statistics</h4>
                        <canvas id="statsChart"></canvas>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Random Admin Tip</h4>
                        <p class="card-text"><?php echo $random_tip; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>

<script>
// Example data for the charts (you should fetch actual data from your database)
const userGrowthData = [10, 50, 100, 200, 300, 400, 500];
const incomeData = [1000, 2000, 3000, 4000, 5000, 6000, 7000];
const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

// User Growth Chart
const ctxUserGrowth = document.getElementById('userGrowthChart').getContext('2d');
const userGrowthChart = new Chart(ctxUserGrowth, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'User Growth',
            data: userGrowthData,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    }
});

// Income Chart
const ctxIncome = document.getElementById('incomeChart').getContext('2d');
const incomeChart = new Chart(ctxIncome, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Income',
            data: incomeData,
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }]
    }
});

// Stats Chart (Pie Chart Example)
const ctxStats = document.getElementById('statsChart').getContext('2d');
const statsChart = new Chart(ctxStats, {
    type: 'pie',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Stats',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
});
</script>
