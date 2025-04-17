<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['pixel'] = $_POST['pixel'];
$_SESSION['subid'] = $_POST['sub_id'];

$url = 'https://be11.tech/ffda426/postback?status=lead&subid=' . $_POST['sub_id'] . '&sub_id_20=' .urlencode($_POST['name']) . '&sub_id_21=' . urlencode($_POST['phone']);
file_get_contents($url);

$fp = fopen('orders.txt', 'a');
    fwrite($fp, date("d-m-Y H:i:s"));
    fwrite($fp, ";");
    fwrite($fp, $_POST['name']);
    fwrite($fp, ";");
    fwrite($fp, $_POST['phone']);
    fwrite($fp, ";");
    fwrite($fp, $_POST['sid1']);
    fwrite($fp, "\n");
    fclose($fp);

    function send_the_order($request)
    {
        $params = array(
            "campaign_id" => "556486",
            
            "phone" => $request["phone"],
            "name" => $request["name"],
            "sid1" => $request["sid1"],
            "sid2" => $request["sid2"],
            "sid3" => $request["sid3"],
            "sid4" => $request["sid4"],
            "sid5" => $request["sid5"],
            "country_code" => $request["country_code"],
            "ip" => $_SERVER['REMOTE_ADDR'],
        );


        $url = "https://tracker.rocketprofit.com/conversion/new";

        // Инициализация cURL
		$ch = curl_init($url);

// Установка опций
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

// Выполнение запроса
		$response = curl_exec($ch);

// Проверка на ошибки
		if (curl_errno($ch)) {
    	echo 'Ошибка: ' . curl_error($ch);
		} else {
    	// Обработка ответа
    	$data = json_decode($response, true);
    	print_r($data);
		}

		// Закрытие cURL
		curl_close($ch);


        header("Location: thanks.php");
    }

     if (!empty($_REQUEST["phone"])) { send_the_order($_REQUEST); }