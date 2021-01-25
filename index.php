<?php
if (isset($_GET['info'])) {
    phpinfo();
    exit;
}
session_start();

if(isset($_POST['hostname'])) {
    $_SESSION['laragon-hostname'] = $_POST['hostname'];
    echo json_encode(['ok']);
    exit;
}

$hostname = isset($_SESSION['laragon-hostname']) ? $_SESSION['laragon-hostname'] : 'local';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laragon</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Karla';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }

        .opt {
            margin-top: 30px;
            font-size: 150%;
        }

        a:hover {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title" title="Laragon">Laragon</div>

        <div class="info"><br/>
            <?php print($_SERVER['SERVER_SOFTWARE']); ?><br/>
            PHP version: <?php print phpversion(); ?> <span><a title="phpinfo()" href="/?info">info</a></span><br/>
            Document Root: <?php print ($_SERVER['DOCUMENT_ROOT']); ?><br/>
            Laragon Docs: <a title="Getting Started" href="https://laragon.org/docs" target="_blank">Getting Started</a><br/>
            Database: <a title="phpMyAdmin" href="/phpmyadmin" target="_blank">phpMyAdmin</a><br/>
            <div class="opt">
                Apps
            </div>
            <a title="Laragon Upload" href="/laragon" target="_blank">Upload</a> |
            <a title="phpSysInfo" href="/phpsysinfo" target="_blank">phpSysInfo</a> |
            <a title="Memcached" href="/memcached" target="_blank">Memcached</a> |
            <a title="phpRedisAdmin" href="/phpredisadmin" target="_blank">phpRedisAdmin</a> |
            <a title="adminer" href="/adminer" target="_blank">adminer</a> <br/>
        </div>
        <div class="opt">
            Project Lists
        </div>
        <div>Hostname: <span>{name}.</span><input id="hostname" value="<?php print $hostname; ?>"></div>

        <?php foreach (glob('*', GLOB_ONLYDIR) as $project): ?>
            <a href="http://<?= strtolower($project . '.' . $hostname) ?>"
                   target="_blank"><?= $project . '.' . $hostname ?></a>
            <br>
        <?php endforeach; ?>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#hostname').change(function() {
            let hostname = document.getElementById('hostname').value;
            $.post('/', {
                hostname: hostname
            })
                .done(function(response) {
                window.location.reload();
            })
        })
    });
</script>
</body>
</html>
