<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Assetone - <?php echo $data['page']['title']; ?></title>
    <meta name="author" content="B3-Best Team">
    <link href="<?php echo $data['baseurl']; ?>assets/lib/css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>assets/lib/js/jquery-ui-1.11.0/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>assets/lib/css/jquery.dataTables.css">
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>assets/lib/js/script.js"></script>
    <script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery-ui-1.11.0/jquery-ui.js"></script>
    <script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery.dataTables.js"></script>

    <script>
    var color = $(".ui-state-default").css("#ffffff");
    
    $(function() {
        $( "#speed" )
        .selectmenu({ icons: { button: "sel-defaultIcon" } })
        .selectmenu({ width: 200 });;
    });
    </script>
</head>
