<?php
header("Access-Control-Allow-Origin: *");
//header('X-PHP-Response-Code: 501', true, 501);
//die;

include 'db.php';
$db = new DB();
$tblName = 'users.act_user';


if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])){
                $userData = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone']
                );

                echo json_encode($userData);


				
				$insert = $db->insert($tblName,$userData);
                if($insert){
                    $data['inserted'] = $insert;
                    $data['status'] = 'OK';
                    $data['msg'] = 'User data has been added successfully.';
                }else{
                    $data['status'] = 'ERR';
                    $data['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['status'] = 'ERR';
                $data['msg'] = 'You must include the data to be inserted.';
            }
            echo json_encode($data);

            