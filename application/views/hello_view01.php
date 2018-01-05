<?php
/**
 * Created by PhpStorm.
 * User: siri
 * Date: 2018-01-04
 * Time: 오후 2:32
 */

?>
<title><?php echo $title?></title>
<table>
    <tr>
        <td>No</td>
        <td>Date</td>
        <td>Name</td>
        <td>Title</td>
        <td>Content</td>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user->no ?></td>
        <td><?php echo $user->date ?></td>
        <td><?php echo $user->name ?></td>
        <td><?php echo $user->title ?></td>
        <td><?php echo $user->content ?></td>
    </tr>
    <?php endforeach; ?>
</table>
