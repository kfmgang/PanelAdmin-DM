<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';
require_once './functions/requests.php';
//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information
$obj = getBannedUsers();

include_once('includes/header.php');


$a = 'game_list.ini'; 
$b = file_get_contents('D:Program Files (x86)/Steam/steamapps/common/Dead Matter Dedicated Server/deadmatter/Saved/Config/WindowsServer/game.ini');  
$c = preg_replace('/Whitelist=/', 'Whitelist[]=', $b);
file_put_contents($a, $c);
$d = file_get_contents('game_list.ini');
$e = preg_replace('/admins=/', 'admins[]=', $d);
file_put_contents($a, $e);
$f = file_get_contents('game_list.ini');
$g = preg_replace('/ServerTags=/', 'ServerTags[]=', $f);
file_put_contents($a, $g);

// parse game_list.ini 
$datas = parse_ini_file( $a, true );
$numWhitelist = count($datas['/Script/DeadMatter.SurvivalBaseGamemode']['Whitelist']);
$test = $datas['/Script/DeadMatter.SurvivalBaseGamemode']['Whitelist'];
$numWhitelist -= 1;

$test = $datas['/Script/DeadMatter.SurvivalBaseGamemode']['Whitelist'];

// <?php print_r($test); 

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-gamepad fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">0</div>
                            <div>Connected users</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-left"></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-user-shield fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">0</div>
                            <div>Connected admins</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-left"></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-user-check fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numWhitelist; ?></div>
                            <div>Whitelist</div>
                        </div>
                    </div>
                </div>
                <a href="whitelist.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-users-slash fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo(count($obj)); ?></div>
                            <div>Banned</div>
                        </div>
                    </div>
                </div>
                <a href="ban.php">
                    <div class="panel-footer">
                        <span class="pull-left" <?php echo (CURRENT_PAGE == 'ban.php') ? ' class="active"' : ''; ?>>View Details</span>
                        <span class="pull-left"></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>   
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4">
            <h4 class="text-center">Daily statistics</h4>
            <div class="panel panel-primary">
            <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                    var day = [];
                    var count = [];

                    for (var i in data) {
                        day.push(data[i].day);
                        count.push(data[i].count);
                    }

                    var chartdata = {
                        labels: day,
                        datasets: [
                            {
                                label: 'Max connected',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: count
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php include_once('includes/footer.php'); ?>