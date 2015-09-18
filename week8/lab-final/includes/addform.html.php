<div class="row">

<form method="post" action="#" enctype="multipart/form-data" class="navbar-form navbar-center">
    <div class="form-group">
        <table class="table">
            <tr>
                <td>
                    Group:
                </td>
                    <td>
                        <select name="selected_address_group" class="form-control">
                        <?php foreach ($addressGroups as $row): ?>
                        <option value="<?php echo $row['address_group_id']; ?>">
                        <?php echo $row['address_group']; ?>
                        </option>
                        <?php endforeach; ?>
                        </select>
                    </td>
            </tr>
        <br />


        <tr>
            <td>Full Name : </td><td><input type="text" name="fullname" value="" class="form-control" /></td>
        </tr>
        <tr>
            <td>Email : </td><td><input type="email" name="email" value="" placeholder="http://www." class="form-control" /></td>
        </tr>
        <tr>
            <td>Address : </td><td><input type="text" name="address" value="" class="form-control" /></td>
        </tr>
        <tr>
            <td>Phone : </td><td><input type="text" name="phone" value="" class="form-control" /></td>
        </tr>
        <tr>
            <td>Website : </td><td><input type="website" name="website" value="" class="form-control" /></td>
        </tr>
        <tr>
            <td>Birthday : </td><td><input type="date" name="birthday" value="" class="form-control" /></td>
        </tr>
        <tr>
            <td>Image: </td><td><input name="upfile" type="file" class="btn btn-default" /></td>
        </tr>
        
        </table>
        <input type="submit" value="Submit" class="btn btn-default" />
    </div>
</form>

</div>