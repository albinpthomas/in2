<?php while ($row = mysqli_fetch_array($Result)) :; ?>
    <option><?php echo $row[1]; ?></option>
<?php endwhile; ?>