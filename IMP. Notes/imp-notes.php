
=================================================================================
1. Display keyboard keys converting them into string including backspace
=================================================================================

var buffer = '';
        var reg = new RegExp("[A-Z]{1}[A-Z0-9]{2}[0-9]{8}");
        var reg1 = /[A-Z]{1}[A-Z0-9]{2}[0-9]{8}/i;

        function keyBuffer(event)
        {
            var r = '';
            r = event.keyCode || event.which || event.charCode;

            if (r === 8) { // Handle backspace key
                event.preventDefault(); // Prevent default backspace behavior (e.g., navigation)

                // Remove the last character from buffer
                if (buffer.length > 0) {
                    buffer = buffer.slice(0, -1);
                }
            }
            else
            {
                // Handle other keys
                // Convert the key code to uppercase character and append to buffer
                var charTyped = String.fromCharCode(r);
                if (/^[A-Za-z0-9\s]$/.test(charTyped)) { // Allow spaces (\s)
                    buffer += charTyped.toUpperCase();
                }
            }
            // console.log(buffer);

            if (reg.test(buffer)) {
                var uor_uid = reg1.exec(buffer)[0];
                buffer = '';
                self.location.href = '<?=basename($_SERVER['PHP_SELF'])?>?autoScanner=' + uor_uid;
            }
            window.status = buffer;
            <?php
            if (!$touchscreen) {
            ?>
            document.getElementById('bufferDisplay').innerHTML = buffer;
            <?php
            }
            ?>
            return true;
        }




=================================================================================
2. Table Aliases
=================================================================================
A table alias allows you to refer to a table by a shorter name within your query. This is particularly useful when you are dealing with joins between multiple tables, as it can simplify the syntax and improve readability.

Column Aliases
A column alias allows you to rename a column's output in the result set. This can be helpful for making the output more readable or when you want to display a computed column with a specific name.

    SELECT a.*, c.dco_name, c.dco_iso3166_2 FROM data_addresses a, data_countries c
    WHERE a.dad_uid = "'.$dad_uid.'"   AND a.dad_6country = c.dco_uid

EXplaination:

    - a.* selects all columns from the data_addresses table.
    - c.dco_name selects the dco_name column from the data_countries table.
    - c.dco_iso3166_2 selects the dco_iso3166_2 column from the data_countries table.



=================================================================================
3. Call JS function on validating php If condition
=================================================================================

    <?php
        $sld_depot = $_POST['sld_depot_to_print'];
        $groupedRecords = groupRecords($sld_depot);
    ?>


        window.onload = function() {
            <?php if ($groupedRecords) { ?>
            updateUIDs();
            <?php } ?>
        };


        function updateUIDs() {
            var select = document.getElementById('record_ranges');
            var selectedOption = select.options[select.selectedIndex].value;
            var values = selectedOption.split('-');
            console.log(values);
            document.getElementById('uid_start').value = values[0];
            document.getElementById('uid_end').value = values[1];
        }



=================================================================================
4. Logic


LXX00125526
LXX00125536
LXX00125556
LXX00125558
LXX00125636
LXX00225556
LXX00225656
LXX00225690
LXX00325656
LXX00325690
LXX00525536
LXX00525556
LXX00525556

  have fetched above records from mysql by running fetch query, now from id such as LXX00525556 - convert into number take value starting after 0 only
- Then create diff. groups of ids following range of 10000, suppose all the ids  start with  00125556  and ends with in 00125636 in one group.

Output:
LXX00125526 - LXX00125636
LXX00225556 - LXX00225690
LXX00325656 - LXX00325690
LXX00525536 - LXX00525556

Solution:

<?php
                    if(isset($_POST['fetch_location_id']))
                    {
                        $sld_depot = $_POST['sld_depot_to_print'];
                        $groupedRecords = groupRecords($sld_depot);


                        ?>
                        <label>Sequences
                            <select name="record_ranges" id="record_ranges" onchange="updateUIDs()">
                                <?php
                                    // Output grouped records
                                    foreach ($groupedRecords as $groupKey => $group) {
                                        $first = reset($group);
                                        $last = end($group);
                                        //echo "$first - $last"."<br>";
                                        echo "<option value=\"{$first}-{$last}\">{$first} - {$last} </option>";
                                    }
                                ?>
                            </select>
                        </label>
                        <?php
                    }
?>


<script>

// Function to group records into ranges with a gap of 10,000
function groupRecords($sld_depot, $range = 10000) {
    $records = [];
    $sql = "SELECT sld_uid FROM stock_location_desc WHERE sld_depot = '$sld_depot'";
    $qry = mysql_query($sql);

    while($row = mysql_fetch_assoc($qry)) {
        $records[] = $row['sld_uid']; // Collecting each record in an array
    }

    $groups = [];

    foreach ($records as $record) {
        // Convert the ID to a number
        $num = convertToNumber($record);

        // Determine the group this number belongs to
        $groupKey = floor($num / $range);

        // Append the record to the appropriate group
        $groups[$groupKey][] = $record;
    }

    return $groups;

}

function convertToNumber($id) {
    // Extract the numeric part of the ID and convert to an integer
    return (int) substr($id, 3);
}

</script>


    <script>
        //  Submitting the location form
        function fetchLocationSubmitForm(action_val) {
            console.log(action_val);
            var form = document.getElementById('LocationForm');
            form.action = action_val;
            form.submit();
        }

        window.onload = function() {
            <?php if ($groupedRecords) { ?>
            updateUIDs();
            <?php } ?>
        };

        function updateUIDs() {
            var select = document.getElementById('record_ranges');
            var selectedOption = select.options[select.selectedIndex].value;
            var values = selectedOption.split('-');
            console.log(values);
            document.getElementById('uid_start').value = values[0];
            document.getElementById('uid_end').value = values[1];
        }
    </script>



=================================================================================
5. Setup Toolstation Documentation in localhost after cloning repo.

        - Project built on Node js, so below is the setup:

        1. Open the codebase in PHP storm
        2. Read README.MD
        3. Do the step 2 given in README.MD
        4. In left side directory - Right click on package.json
        5. Click on 'Run NPM install'.
        6. Setup done, you'll port - your project is running in local


=================================================================================
6. self: in OOPS if fucntion is defined with in the class to use that we use "self"

public function connectDbSlaveLow() {
    $answer = self::connectDbSlave();
}

public function connectDbSlave() {

}