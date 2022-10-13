<?php
$data=file_get_contents("https://data.covid19.go.id/public/api/skor.json");
$covid=json_decode($data);
//echo"<pre>";print_r($pahlawan);
echo"<h1>Data Risiko COVID 19 Seluruh Provinsi Indonesia (Risk score)</h1>";
$table="Tanggal    : {$covid->tanggal} ";

$table .= "<table border=1>
            <tr><td>No</td>
            <td>Provinsi</td>
            <td>Kode Provinsi</td>
            <td>kota</td>
            <td>Kode Kota</td>
            <td>Hasil Resiko</td></tr>";
for($i=0;$i<count($covid -> data); $i++){
    $no=$i+1;
    $table.="<tr><td>{$no}</td>
                <td>{$covid->data[$i]->prov}</td>
                <td>{$covid->data[$i]->kode_prov}</td>
                <td>{$covid->data[$i]->kota}</td>
                <td>{$covid->data[$i]->kode_kota}</td>
                <td>{$covid->data[$i]->hasil}</td>
                </tr>";
}
$table .="</table>";
echo $table;
?>