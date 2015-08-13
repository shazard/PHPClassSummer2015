<form action="#" method="get">
    <fieldset>
        <legend>Search Data</legend>
        <br>
        
        <label>Search Column</label>  
        <select name="datatwo">
            <option value="id">ID</option>
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Incorporation Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zip Code</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        
        <label>Search Data</label>
        <input name="dataone" type="search" placeholder="Search...." />
        <input name="datatwo" value="search" type="hidden" />
    
        <input type="hidden" name="action" value="search" />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </fieldset>            
</form>