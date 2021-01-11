<?php

mysqli_report(MYSQLI_REPORT_STRICT);

class MyModel {

    public $connection = '';

    function __construct() {
        // echo "hii";
        try {
            $this->connection = new mysqli("localhost", "aveo", "Aveo_123", "rexx_system");
        } catch (Exception $e) {
            // echo "hii";
            $msg = $e->getMessage();
            $folderName = "DBErrorLog";
            if (!file_exists($folderName)) {
                mkdir($folderName); // in windows its working 
                // mkdir($folderName,0777,true); // ubuntu require permission 
            }
            $FileName = $folderName . "/ErrorLog_" . date("d_M_Y") . ".txt";
            file_put_contents($FileName, PHP_EOL . "TIME:>> " . date('Y-m-d H:i A') . PHP_EOL . "ErrorMessage:>> " . $msg . PHP_EOL, FILE_APPEND);
        }
    }

    function InsertData($tbl, $data) {
        $clms = implode(',', array_keys($data));
        $vals = implode("','", $data);
        $InsertSQL = "INSERT INTO $tbl($clms)VALUES('$vals')";
        //echo $InsertSQL; exit;
        $InsertEx = $this->connection->query($InsertSQL);
        if ($InsertEx == 1) {
            $Response["Data"] = '';
            $Response["Message"] = 'Success';
            $Response["Code"] = '1';
        } else {
            $Response["Data"] = '';
            $Response["Message"] = 'Try again';
            $Response["Code"] = '0';
        }
        return $Response;
    }

    function SelectData($tbl, $where = '') {
        $Sql = " SELECT * FROM $tbl";
        if ($where != '') {
            $Sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $Sql .= " $key LIKE '$value%' AND";
            }
            $Sql = rtrim($Sql, 'AND');
        }
        $Sql .= " order by id desc";
        //echo $Sql;exit;
        $Ex = $this->connection->query($Sql);
        $allData = []; 
        $total = [];
        if ($Ex->num_rows > 0) {
            
            while ($FetchData = $Ex->fetch_object()) {
                $allData[] = $FetchData;
                $total[] = $FetchData->participation_fee;
                //print_r($allData);exit;
            }
            $Res['Data'] = [$allData, array_sum($total)];
            $Res['Code'] = 1;
            $Res['Msg'] = "Success";
            //print_r($Res);exit;
        } else {
            $Res['Data'] = [$allData, array_sum($total)];
            $Res['Code'] = 0;
            $Res['Msg'] = "no data";
            //	print_r($Res);
        }
        return $Res;
        // echo '<pre>';
        //print_r($Res);
    }

    function UniqueEmpNames($tbl, $column) {

        $Sql = "SELECT DISTINCT $column from $tbl order by $column ASC";
        //echo $Sql;exit;
        $Ex = $this->connection->query($Sql);
        if ($Ex->num_rows > 0) {

            while ($FetchData = $Ex->fetch_object()) {
                $allData[] = $FetchData;
                //print_r($allData);
            }

            $Res['Data'] = $allData;
            $Res['Code'] = 1;
            $Res['Msg'] = "Success";
            //	print_r($Res);
        } else {
            $Res['Data'] = 0;
            $Res['Code'] = 0;
            $Res['Msg'] = "no data";
            //	print_r($Res);
        }
        return $Res;
    }

}

?>
