<?php
        require_once 'includes/session-start.req-inc.php';
        require_once 'includes/access-required.html.php';
        

?>
<h1 class="cover-heading">Add New Item To Address Book</h1>
<hr>
<br>


<?php
        $addressGroups = getAddressGroups();
        $newAddressData = array();
                
        if ( isPostRequest() ) {
            
            $newAddressData[0] = $_SESSION['currentUserID'];
            $newAddressData[1] = filter_input(INPUT_POST, 'selected_address_group');
            $newAddressData[2] = filter_input(INPUT_POST, 'fullname');
            $newAddressData[3] = filter_input(INPUT_POST, 'email');
            $newAddressData[4] = filter_input(INPUT_POST, 'address');
            $newAddressData[5] = formatPhone(stripDownPhone(filter_input(INPUT_POST, 'phone')));
            $newAddressData[6] = filter_input(INPUT_POST, 'website');
            $newAddressData[7] = filter_input(INPUT_POST, 'birthday');
            
            
            
            $errors = validateNewItem($newAddressData);
            
            if ( count($errors) == 0 ) 
            {                
                $newAddressData[8] = uploadImage();
                if ( empty($newAddressData[8]) ) {
                $errors[] = 'Image could not be uploaded';
                $results = 'Empty Image';
                }
                
                if ( addNewItem($newAddressData) ) {
                    $results = 'New item added to address book';
                } else {
                    $results = 'Item was not Added';
                }
            }
            else
            {
                $results = 'Errors found';
            }
            
        }
        //var_dump($newAddressData);
        ?>

        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
 
        <form method="post" action="#" enctype="multipart/form-data" class="navbar-form navbar-center">
            <div class="form-group">
                Group:
                <select name="selected_address_group" class="form-control">
                <?php foreach ($addressGroups as $row): ?>
                    <option value="<?php echo $row['address_group_id']; ?>">
                        <?php echo $row['address_group']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br />


                Full Name : <input type="text" name="fullname" value="" class="form-control" /> 
                <br />
                Email : <input type="email" name="email" value="" class="form-control" /> 
                <br />
                Address : <input type="text" name="address" value="" class="form-control" /> 
                <br />
                Phone : <input type="text" name="phone" value="" class="form-control" /> 
                <br />
                Website : <input type="website" name="website" value="" class="form-control" /> 
                <br />
                Birthday : <input type="date" name="birthday" value="" class="form-control" /> 
                <br />
                Image: <input name="upfile" type="file" class="btn btn-default" />
                <br />
                <input type="submit" value="Submit" class="btn btn-default" />
            </div>
        </form>