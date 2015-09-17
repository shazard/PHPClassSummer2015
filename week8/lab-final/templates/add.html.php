<?php
        require_once 'includes/session-start.req-inc.php';
        require_once 'includes/access-required.html.php';
        

?>
<h1 class="cover-heading">Add New Item To Address Book</h1>

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
 
<?php
        include 'includes/addform.html.php';
?>