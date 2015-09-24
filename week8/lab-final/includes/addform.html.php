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
                            <option value="<?php echo $row['address_group_id']; ?>" <?php if (isset($newAddressData[1]) && $newAddressData[1] == $row['address_group_id']) echo 'selected'; ?>>
                        <?php echo $row['address_group']; ?>
                        </option>
                        <?php endforeach; ?>
                        </select>
                    </td>
            </tr>
        <br />


        <tr>
            <td>Full Name : </td><td><input type="text" name="fullname" value="<?php if (isset($newAddressData[2])) {echo $newAddressData[2];} ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Email : </td><td><input type="email" name="email" value="<?php if (isset($newAddressData[3])) {echo $newAddressData[3];} ?>"  class="form-control" /></td>
        </tr>
        <tr>
            <td>Address : </td><td><input type="text" name="address" value="<?php if (isset($newAddressData[4])) {echo $newAddressData[4];} ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Phone : </td><td><input type="text" name="phone" value="<?php if (isset($newAddressData[5])) {echo $newAddressData[5];} ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Website : </td><td><input type="website" name="website" value="<?php if (isset($newAddressData[6])) {echo $newAddressData[6];} ?>" placeholder="http://www." class="form-control" /></td>
        </tr>
        <tr>
            <td>Birthday : </td><td><input type="date" name="birthday" value="<?php if (isset($newAddressData[7])) {echo date("Y-m-d", strtotime($newAddressData[7]))  ;} ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Image: </td><td><input name="upfile" type="file" class="btn btn-default" /></td>
        </tr>
        
        </table>
        <input type="submit" value="Submit" class="btn btn-default" />
    </div>
</form>

</div>