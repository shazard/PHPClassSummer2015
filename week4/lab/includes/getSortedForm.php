
<!--

-->


<form action="#" method="post">
    <fieldset>Sort Data</legend>
        <br><br>
        <label>Sort Order</label><br>
        Ascending<input type="radio" name="sortOrder" value="ascend" />
        Descending<input type="radio" name="sortOrder" value="descend" />

        <br><br>
        <label>Sort By</label>  
        <select name="datatwo">
            <option value="id">ID</option>
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Incorporation Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zip Code</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Submit1" />
        <input type="submit" value="Reset1" />
    </fieldset>    
</form>
