<table>
    <tr>
        <th>Login</th>
        <th>email</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Activation status</th>
        <th>Date of registration</th>
        <th>Delete</th>
    </tr>
    <?php foreach($users as $user):?>
    <tr>
        <td><?=$user->login?></td>
        <td><?=$user->email?></td>
        <td><?=$user->firstName?></td>
        <td><?=$user->lastName?></td>
        <td><?=$user->activated?></td>
        <td><?=$user->dateOfRegistration?></td>
        <td>
            <form action="/user/Delete/<?=$user->login?>" method="post">
                <input type="hidden" name="userId" value="<?=$user->id?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach;?>
</table>