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
                        <option value="<?php echo $row['address_group_id'];?>" <?php if ($addressToUpdate[0]['address_group_id'] == $row['address_group_id']) echo 'selected'; ?>>
                        <?php echo $row['address_group']; ?>
                        </option>
                        <?php endforeach; ?>
                        </select>
                    </td>
            </tr>
        <br />


        <tr>
            <td>Full Name : </td><td><input type="text" name="fullname" value="<?php echo $addressToUpdate[0]['fullname']; ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Email : </td><td><input type="email" name="email" value="<?php echo $addressToUpdate[0]['email']; ?>" placeholder="http://www." class="form-control" /></td>
        </tr>
        <tr>
            <td>Address : </td><td><input type="text" name="address" value="<?php echo $addressToUpdate[0]['address']; ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Phone : </td><td><input type="text" name="phone" value="<?php echo $addressToUpdate[0]['phone']; ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Website : </td><td><input type="website" name="website" value="<?php echo $addressToUpdate[0]['website']; ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Birthday : </td><td><input type="text" name="birthday" value="" placeholder="<?php echo $viewdate; ?>" class="form-control" onfocus="(this.type='date')" /></td>
        
        </tr>
        <tr>
            <td>Image: </td><td><input name="upfile" type="file" class="btn btn-default" /></td>
        </tr>
        
        </table>
        <input type="submit" value="Submit" class="btn btn-default" />
        <input type="hidden" name="old_image" value="<?php echo $addressToUpdate[0]['image']?>">
        <input type="hidden" name="old_birthday" value="<?php echo $addressToUpdate[0]['birthday']?>">
    </div>
</form>

</div>