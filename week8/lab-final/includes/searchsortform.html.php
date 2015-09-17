<div class="row">
        <table class="table">
            <tr>
                <td><b>View By Group:</b></td>
                <td><b>Search:</b></td>
            </tr>
            <tr>
                <td>
        <form method="post" action="#">
                <select name="selected_address_group" class="form-control">
                <?php                
                    $selectedAddressGroupId = filter_input(INPUT_POST, 'selected_address_group');
                    foreach ($addressGroups as $row): ?>
                    <option value="<?php echo $row['address_group_id']; ?>"<?php if ($row['address_group_id'] == filter_input(INPUT_POST, "$selectedAddressGroupId")) echo "selected";?>>
                        <?php echo $row['address_group']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br>
                <input type="submit" value="Submit" class="btn btn-default" />
        </form>
                </td>
                <td>                
        <form method="post" action="#">
                <select name="selected_search_index" class="form-control">
                <?php                
                    $searchIndex = filter_input(INPUT_POST, 'selected_search_index');
                    $searchField = filter_input(INPUT_POST, 'search_field');
                ?>
        
                    <option value="fullname"<?php if ($searchIndex == "fullname") echo "selected";?>>
                        Name
                    </option>
                    <option value="address"<?php if ($searchIndex == "address") echo "selected";?>>
                        Address
                    </option>
                    <option value="email"<?php if ($searchIndex == "email") echo "selected";?>>
                        Email
                    </option>
                    <option value="phone"<?php if ($searchIndex == "phone") echo "selected";?>>
                        Phone
                    </option>
                </select>
            <br>
                <input type="text" name="search_field" value="" placeholder="Search" class="form-control" />
                <br>
                <input type="submit" value="Search" class="btn btn-default" />
        </form>
                </td>
            </tr>
            
    </table>
</div>