<li <?php if ($department==''){echo 'class="active"';} ?>><?php echo anchor('/', 'Dashboard', 'title="Home"'); ?></li>
<li <?php if ($department=='CSE'){echo 'class="active"';} ?>><?php echo anchor('department/index/CSE', 'CSE', 'title="CSE"'); ?></li>
<li <?php if ($department=='IT'){echo 'class="active"';} ?>><?php echo anchor('department/index/IT', 'IT', 'title="CSE"'); ?></li>
<li <?php if ($department=='ECE'){echo 'class="active"';} ?>><?php echo anchor('department/index/ECE', 'ECE', 'title="CSE"'); ?></li>
<li <?php if ($department=='EEE'){echo 'class="active"';} ?>><?php echo anchor('department/index/EEE', 'EEE', 'title="CSE"'); ?></li>
<li <?php if ($department=='CIVIL'){echo 'class="active"';} ?>><?php echo anchor('department/index/CIVIL', 'CIVIL', 'title="CSE"'); ?></li>
<li <?php if ($department=='MECH'){echo 'class="active"';} ?>><?php echo anchor('department/index/MECH', 'MECH', 'title="CSE"'); ?></li>
