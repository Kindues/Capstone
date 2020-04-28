<?php require_once('../../private/initialize.php'); ?>

<?php
require_login();
$member_set = find_all_members();

?>
<?php $page_title = 'members'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Fan Club Members</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/members/new.php'); ?>">Create New Member</a>
    </div>

    <table class="list">
      <tr id="admins-table">
        <th>Fan ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Member Level</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>


      <?php while($member = mysqli_fetch_assoc($member_set)) { ?>
      <tr>
        <td><?php echo h($member['member_id']); ?></td>
        <td><?php echo h($member['first_name']); ?></td>
        <td><?php echo h($member['last_name']); ?></td>
        <td><?php echo h($member['email']); ?></td>
        <td><?php echo h($member['username']); ?></td>
        <td><?php echo h($member['phone']); ?></td>
        <td><?php echo h($member['member_level']); ?></td>
        <td><a class="action" href="<?php echo url_for('/members/show.php?id=' . h(u($member['member_id']))); ?>">View</a></td>
        <td><a class="action" href="<?php echo url_for('/members/edit.php?id=' . h(u($member['member_id']))); ?>">Edit</a></td>
        <td><a class="action" href="<?php echo url_for('/members/delete.php?id=' . h(u($member['member_id']))); ?>">Delete</a></td>
      </tr>
      <?php } ?>
    </table>
    <?php
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
