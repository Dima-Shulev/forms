<?php

use Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }

    public function store()
    {

        if(isset($_POST['pushButton'])) {
            if (($_POST['tel'] === "") || ($_POST['name'] === "" || $_POST['test'] === "")) {
                $arr = "Ошибка. Вы не заполнили обязатеьные поля.";
                $this->view->generate('error_view.php', 'template_view.php',$arr);
                exit;
            }
            $tel = trim(htmlspecialchars( $_POST['tel']));
            $tel = str_replace(['(', ')', '-', ' '], '',$tel);

            if(!preg_match("/^[0-9]{10,11}+$/", $tel) && substr($tel,0,1) !== "+") {
                $arr = "Ошибка. Неверный формат телефона.";
                $this->view->generate('error_view.php', 'template_view.php',$arr);
                exit;
            }

            if(strlen($tel) > 12){
                $arr = "Ошибка. Слишком длинный номер телефона.";
                $this->view->generate('error_view.php', 'template_view.php',$arr);
                exit;
            }

            $tel = strrev($tel);
            $tel = substr($tel,0,10);
            $tel = "+7".strrev($tel);

            $name = trim(htmlspecialchars($_POST['name']));
            $hidden = trim(htmlspecialchars($_POST['test']));

            $number = true;

            // Здесь по задаче не было сказано с чем сравнивать уже отправленные данные.
            // Поэтому выполнил проверку в обычном текстовом файле.
            // Конечно можно было записывать данные в базу данных и оттуда извлекать их и сравнивать.
            // Однако ORM включил

            $checkNumber = file_get_contents('number.txt');

            if (strpos($checkNumber, ',')) {
                $checkNumber = explode(',', $checkNumber);
                foreach ($checkNumber as $item) {
                    if ($item === $tel) {
                        $number = false;
                    }
                }
            }

            if ($number == true && $tel !== '') {
                file_put_contents('number.txt', $tel . ",", FILE_APPEND);
                $headers = [
                    'Content-Type: application/json',
                    'Authorization: Bearer NWJLZGEWOWETNTGZMS00MZK4LWFIZJUTNJVMOTG0NJQXOTI3'
                ];
                $data = [
                    'stream_code' => 'iu244',
                    'client' => [
                        'name' => $name,
                        'phone' => $tel,
                    ],
                    'sub1' => $hidden
                ];

                /*$curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_URL, 'https://order.drcash.sh/v1/order');
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                $out = curl_exec($curl);
                $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                $status_code = (int)$status_code;*/

                //проверка получения результата от стороннего ресурса
                //var_dump(json_decode($out));

                $errors = [
                    301 => 'Moved permanently.',
                    400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
                    401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
                    403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
                    404 => 'Not found.',
                    500 => 'Internal server error.',
                    502 => 'Bad gateway.',
                    503 => 'Service unavailable.'
                ];

               /* try {
                    if ($status_code < 200 || $status_code > 204) {
                        throw new Exception(isset($errors[$status_code]) ? $errors[$status_code] : 'Undefined error', $status_code);
                    }
                } catch (\Exception $e) {
                    die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
                }*/
                $this->view->generate('success_view.php', 'template_view.php');
                exit;
            } else {
                $arr = "Большое спасибо, но Вы уже отправили форму. Повторно отправлять не нужно.";
                $this->view->generate('error_view.php', 'template_view.php',$arr);
                exit;
            }
        }
    }
}