<div class="well">
<form action="#" method="get">
    <fieldset>
        <legend>Search Data</legend>
        
        
        <label>Search Column</label>  
        <select name="searchColumn">
            <?php 
                $columnHeaders = fillColumnArray();
                $columnSelection = filter_input(INPUT_GET, 'searchColumn');
                $searchSelection = filter_input(INPUT_GET, 'userSearch');

                for ($i=0; $i < 7; $i++){ ?>
                <option value="<?php echo $columnHeaders[0][$i];?>"<?php if ($columnSelection == $columnHeaders[0][$i]) echo "selected";?>><?php echo $columnHeaders[1][$i];?></option>
            <?php } ?>  
        </select>
       
        <label>Search Data</label>
        <input name="userSearch" type="search" placeholder="Search...." value = "<?php if (isGetRequest())echo $searchSelection;    ?>"/>
    
        <input type="hidden" name="action" value="search" />
        <input type="submit" class="btn btn-sm btn-primary" value="Submit" />
        <input type="reset" class="btn btn-sm btn-primary" value="Reset" />
    </fieldset>            
</form>
</div>