<form action="#" method="get">
    <fieldset>
        <legend>Search Data</legend>
        <br>
        
        <label>Search Column</label>  
        <select name="searchColumn">
            <?php 
                $results = fillColumnArray();
                for ($i=0; $i < 7; $i++){ ?>
                <option value="<?php echo $results[$i];?>"><?php echo $results[$i];?></option>
            <?php } ?>  
        </select>
        
        <label>Search Data</label>
        <input name="userSearch" type="search" placeholder="Search...." />
    
        <input type="hidden" name="action" value="search" />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </fieldset>            
</form>