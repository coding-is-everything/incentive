<!DOCTYPE html>
<html>
<body>

<h1>Student</h1>

<p>Welcome <?php echo $this->session->userdata('userName');?></p>
 <a  title="Logout"  href="<?php echo site_url() ?>Login/logout">
          Logout
          </a>

</body>
</html>