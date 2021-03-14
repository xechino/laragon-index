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

        .appicon {
            height: 48px;
            width: 48px;
        }
        
        .appicon:link {
            text-decoration: none;
        }
        
        .appicon img {
            max-height: 48px;
            max-width: 48px;
            text-align: center;
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
            <a class="appicon" title="Chat" href="https://chat.google.com" target="_blank">
                <img src="//www.gstatic.com/dynamite/images/favicons_202011171613/chat-favicon-no-new-48dp.png">
            </a>
            <a class="appicon" title="Chat" href="https://mail.google.com/" target="_blank">
                <img src="https://www.gstatic.com/images/branding/product/2x/gmail_2020q4_32dp.png">
            </a>
            <a class="appicon" title="Chat" href="https://gitlab.com" target="_blank">
                <img src="https://about.gitlab.com/ico/favicon-96x96.png">
            </a>
            <a class="appicon" title="Chat" href="https://trello.com" target="_blank">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACw0lEQVRo3t2YTU9TURCGZ1GXsuKXsAV+AD+n3YF8VERRFCiJCxNJ1LhwxbJr4KIgyIdSWhAUaUvZkVS+RLjmdU7ZzoCcySUcJ3lOmpyb586zalMiN2O1FJOmsb0SEzO4pcQXO9YyjZ0bk9tNUa6WZxAY+cbufGQYBEqaaLRaYhAoRQ6oxAwCJSYa4Q8hQyNlSNzJlZGdq2Oyeopo92qm+bnRpQPcfV6B5nR37pnpf3S6d7sd3C6ak2h4BxLZ2Tp85tXaITSnu/MZt4vm5IAfkJis/vJ62Xb9HJrT3fmM20VzEj3bhkTkGbDz8xya0935jNtFc3LAd0jYAmSnLUB2Ej3lQ8AUoDhNAYqTA75BwhYgO20BspNoaAsSUfXEP0Bx+gecqE4O2ISELUB22gJkJ9GTr5DwDziD5nR33gGK8z8IeLwBiahiCFCc3gG8i+bkgHVIRJVjQ4Ds9A84Vp1EgyVImAIUpylAcXJAERK2ANlpC5CdRI/4EDAFKE5TgOLkgDVI2AJkpy1AdhI9LEAiqhz5BdTPoDndnV/AkerkgFVI2AJkpy1AdhINfIFEVPYN+A3Nubjn990ysVFXnRzwGRK2ANnZ8W4bx2d/ruXbP4nRMr6pOoke8CFgClCcjubhAtpeb6H9zdW08nNNQ6uX+jhgBRJR+dAQsHJzUP8yJEwBijMRqH8JEraApZuD7i9CwhSgOBMh/IDsJ0hE5QP/AMWZCJRdgIQtYOHmoL55SEQ7hgDFmQjU9xES/gGn0JyJQL18CEyU9r0CFmtH0JyJQL1zkGh5scq/Q673P477ndPxdh2aMxGoZxYaTQPzaH1ZQPv42pW0jRfQPLiAy3yJQD0fEDTU/R5BQ90zCBq6NxMzCJSYA6ISg0ApEnVNZxgEStoFpKhrKs8gMPKN3RvTOZVi0tQ5WWRiBreU+GJHt+tUY/m/IknsszlfvSQAAAAASUVORK5CYII=">
            </a>
            <a class="appicon" title="Notion" href="https://www.notion.so" target="_blank">
                <img src="https://www.notion.so/front-static/favicon.ico">
            </a>
            <div></div>
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
            <a href="http://<?php echo strtolower($project . '.' . $hostname) ?>"
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
