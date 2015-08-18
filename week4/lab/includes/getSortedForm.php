
<form action="#" method="get">
    <fieldset>Sort Data</legend>
        <br><br>
        <label>Sort Order</label><br>
        Ascending<input type="radio" name="sortOrder" value="ASC" />
        Descending<input type="radio" name="sortOrder" value="DESC" />

        <br><br>
        <label>Sort By</label>  
        <select name="sortBy">
            <?php 
                $results = fillColumnArray();
                for ($i=0; $i < 7; $i++){ ?>
                <option value="<?php echo $results[$i];?>"><?php echo $results[$i];?></option>
            <?php } ?>            
        </select>
        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </fieldset>    
</form>
