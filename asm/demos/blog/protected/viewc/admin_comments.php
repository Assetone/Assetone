<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DooPHP Blog Admin - Approve Comments</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="Shortcut Icon" href="http://doophp.com/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $data['rootUrl']; ?>global/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $data['rootUrl']; ?>global/css/demo.css" media="screen" />


</head>
<body>

<div id="wrap">

<?php include "top.php"; ?>

<div id="content">
    <div class="left">

        <h1>Approve Comments</h1><br/>
        <p>Approve/reject the comments:</p><br/>
        <div class="articles">
          <?php if( isset($data['comments']) && !empty($data['comments']) ): ?>
              <?php foreach($data['comments'] as $k1=>$v1): ?>
                  <strong>Author: </strong><span><?php echo $v1->author; ?></span><br/>
                  <strong>Email: </strong><span><?php echo links($v1->email); ?></span><br/>
                  <strong>Website: </strong><span><?php echo LINKS($v1->url); ?></span><br/>
                  <strong>Comment: </strong><span><?php echo $v1->content; ?></span><br/>
                  <span><a href="<?php echo $data['rootUrl']; ?>admin/comment/approve/<?php echo $v1->id; ?>">[Approve]</a></span> | <span><a href="<?php echo $data['rootUrl']; ?>admin/comment/reject/<?php echo $v1->id; ?>">[Reject]</a></span>
                  <hr class="divider"/>

              <?php endforeach; ?>
          <?php else: ?>
              <h4>No comments to approve or reject.</h4>
          <?php endif; ?>
        </div>
    </div>

    <div class="right">
        <?php include "admin_sidebar.php"; ?>
    </div>

    <div style="clear: both;"> </div>
</div>

<div id="bottom"> </div>

    <div id="footer">
        Powered by <a href="http://www.doophp.com/">DooPHP framework</a>, for educational purpose.
    </div>
</div>

</body>
</html>