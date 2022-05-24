<div>
    <?php
        // print_r($input);
        // echo "<br>";
        // print_r($kost_data);
        print_r($id_res);
        echo "<br>";
        print_r($kost_end);
    ?>

    <div>Input data</div>
    <table>
        <tr>
            <th>id</th>
            <th>ukuran</th>
            <th>wifi</th>
            <th>toilet</th>
            <th>kasur</th>
            <th>meja</th>
            <th>lemari</th>
            <th>harga</th>
            <th>Jarak</th>
        </tr>
        <?php foreach($input_clean as $input) :?>
            <tr>
                <td><?=$input['id'] ?></td>
                <td><?=$input['ukuran'] ?></td>
                <td><?=$input['wifi'] ?></td>
                <td><?=$input['toilet'] ?></td>
                <td><?=$input['kasur'] ?></td>
                <td><?=$input['meja'] ?></td>
                <td><?=$input['lemari'] ?></td>
                <td><?=$input['harga'] ?></td>
                <td><?=$input['jarak'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div>Kost data</div>
    <table>
        <tr>
            <th>id</th>
            <th>ukuran</th>
            <th>wifi</th>
            <th>toilet</th>
            <th>kasur</th>
            <th>meja</th>
            <th>lemari</th>
            <th>harga</th>
            <th>Jarak</th>
        </tr>
        <?php foreach($kost_clean as $kost) :?>
            <tr>
                <td><?=$kost['id'] ?></td>
                <td><?=$kost['ukuran'] ?></td>
                <td><?=$kost['wifi'] ?></td>
                <td><?=$kost['toilet'] ?></td>
                <td><?=$kost['kasur'] ?></td>
                <td><?=$kost['meja'] ?></td>
                <td><?=$kost['lemari'] ?></td>
                <td><?=$kost['harga'] ?></td>
                <td><?=$kost['jarak'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div>KNN Result</div>
    <table>
        <tr>
            <th>id</th>
            <th>ukuran</th>
            <th>wifi</th>
            <th>toilet</th>
            <th>kasur</th>
            <th>meja</th>
            <th>lemari</th>
            <th>harga</th>
            <th>Jarak</th>
        </tr>
        <?php foreach($knn_result as $kost) :?>
            <tr>
                <td><?=$kost['id'] ?></td>
                <td><?=$kost['ukuran'] ?></td>
                <td><?=$kost['wifi'] ?></td>
                <td><?=$kost['toilet'] ?></td>
                <td><?=$kost['kasur'] ?></td>
                <td><?=$kost['meja'] ?></td>
                <td><?=$kost['lemari'] ?></td>
                <td><?=$kost['harga'] ?></td>
                <td><?=$kost['jarak'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>