
<form action="#" method="get">
    <fieldset>Sort Data</legend>
        <br><br>
        <label>Sort Order</label><br>
        Ascending<input type="radio" name="sortOrder" value="ASC" />
        Descending<input type="radio" name="sortOrder" value="DESC" />

        <br><br>
        <label>Sort By</label>  
        <select name="sortBy">
            <option value="id">ID</option>
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Incorporation Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zip Code</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </fieldset>    
</form>
