<?php
date_default_timezone_set('Asia/Kolkata');
require_once("Model/MyModel.php");
session_start();

class MyController extends MyModel {

    function __construct() {
        parent::__construct();
        if (isset($_SERVER['PATH_INFO'])) {
            $RequestUriArray = explode('/', $_SERVER['REQUEST_URI']);
            $DynamicUrl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/" . $RequestUriArray[1] . "/";
            $base_location = 'index';
            $batch_limit = 1000;
            $bookings_tbl = 'bookings';

            switch ($_SERVER['PATH_INFO']) {

                case '/index':


                    include 'Views/index.php';

                    try {
                        //$this->connection->beginTransaction();
                        if (isset($_POST['submit'])) {
                            // read json file
                            $datas = json_decode(file_get_contents($_FILES['importfile']['tmp_name']), true);

                            if (!empty($datas) && count($datas) <= $batch_limit) {

                                foreach ($datas as $data) {
                                    $ins_data = $this->InsertData('bookings', $data);
                                }
                                ?>
                                <script type="text/javascript">
                                    window.location.href = '<?php echo $base_location; ?>';
                                </script>
                                <?php
                            } elseif (count($datas) > $batch_limit) {
                                ?>
                                <script type="text/javascript">
                                    alert('We are not able to process data as batch limit exceed!');
                                    window.location.href = '<?php echo $base_location; ?>';
                                </script>
                                <?php
                            } else {
                                ?>
                                <script type="text/javascript">
                                    alert('The file is empty / Please upload valid JSON file!');
                                    window.location.href = '<?php echo $base_location; ?>';
                                </script>
                                <?php
                            }
                        }
                        //$this->connection->commit();   
                    } catch (\Throwable $e) {
                        //$this->connection->rollback();
                        throw $e;
                    }


                    break;

                case '/get_bookings_data':
                    try {
                        $emp_name = isset($_GET['emp_name']) ? $_GET['emp_name'] : null;
                        $event_name = isset($_GET['event_name']) ? $_GET['event_name'] : null;
                        $event_date = isset($_GET['event_date']) ? $_GET['event_date'] : null;
                        $filter_data = ['employee_name' => $emp_name, 'event_name' => $event_name, 'event_date' => $event_date];
                        $all_data = $this->SelectData($bookings_tbl,$filter_data);
                        echo json_encode($all_data);
                    } catch (\Throwable $e) {
                        throw $e;
                    }
                    break;

                case '/get_emp_name':
                    try {
                        $all_data = $this->UniqueEmpNames($bookings_tbl, "employee_name");
                        echo json_encode($all_data);
                    } catch (\Throwable $e) {
                        throw $e;
                    }
                    break;

                case '/get_event_name':
                    try {
                        $all_data = $this->UniqueEmpNames($bookings_tbl, "event_name");
                        echo json_encode($all_data);
                    } catch (\Throwable $e) {
                        throw $e;
                    }
                    break;

                case '/get_event_date':
                    try {
                        $all_data = $this->UniqueEmpNames($bookings_tbl, "event_date");
                        echo json_encode($all_data);
                    } catch (\Throwable $e) {
                        throw $e;
                    }
                    break;
            }
        } else {
            ?>
            <script type="text/javascript">
                window.location.href = '<?php echo $base_location; ?>';
            </script>
            <?php
        }
    }

}

$obj = new MyController;
?>