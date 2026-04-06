<?
header('Access-Control-Allow-Origin: *');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $_SERVER["DOCUMENT_ROOT"] . '/local/templates/tinger/scripts/test/PHPMailer/src/Exception.php';
require $_SERVER["DOCUMENT_ROOT"] . '/local/templates/tinger/scripts/test/PHPMailer/src/PHPMailer.php';
require $_SERVER["DOCUMENT_ROOT"] . '/local/templates/tinger/scripts/test/PHPMailer/src/SMTP.php';



function object_to_array($data)
{
    if (is_array($data) || is_object($data))
    {
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[$key] = object_to_array($value);
        }
        return $result;
    }
    return $data;
}

# Получить JSON как строку
$json_str = file_get_contents('php://input');
# Получить объект
$json_obj = json_decode($json_str);

$json_arr = object_to_array($json_obj);

$data = [
    "message" => $json_arr["letter text"],
    "name" => $json_arr["name"],
    "family_name" => $json_arr["family name"],
    "delivery_date" => $json_arr["delivery date"],
    "delivery_date_timestamp" => strtotime($json_arr["delivery date"]),
    "type" => $json_arr["type"],
    "email" => $json_arr["E-mail "],
    "age" => $json_arr["age"],
    "sex" => $json_arr["Пол"],
    "place" => $json_arr["place"],
    "today_date" => date("d-m-Y"),
    "today_date_timestamp" => strtotime(date("d-m-Y")),
];

if (!empty($json_arr["file_0"])) {
    $data["file"] = $json_arr["file_0"];
}

if ($data["delivery_date_timestamp"] == $data["today_date_timestamp"]) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->CharSet = "UTF-8";
        $mail->Host       = 'smtp.yandex.ru';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pismo@rywok.ru';                     //SMTP username
        $mail->Password   = 'mcaecizqlpcqnppk';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pismo@rywok.ru', 'Письмо в будущее');
        $mail->addAddress($data["email"], $data["name"]);     //Add a recipient
        if ($data["type"] == "Публичное*") {
            $mail->addAddress('333knyaz333@gmail.com'); //Name is optional
        }
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        $title = "Письмо в будущее";
        $body = "
        <div style='width: 100%;
                    background-image: url(https://new.tinger.ru/local/templates/tinger/scripts/test/style/img/пример_письма.png);
                    background-repeat: no-repeat;
                    background-size: cover;
        '>
            <div style='
                        margin-left: 30%;
                        padding-top: 2%;
            '>
                <h1 style='font-size: 37px;color: #1E90FF;'>Письмо в будущее самому себе</h1>
            </div>
            <div style='margin-left: 30%'>
                <p style='font-size:20px;color:#1E90FF;'>". date("d M Y", $data["delivery_date_timestamp"]) ." ты отправил(-а) письмо себе в будущее. Будущее наступило</p>
            </div>
            <div style='padding: 20% 15% 15% 20%; font-size:20px'>
                <div>
                    <p>«". $data["name"] . " " . date("Y", $data["delivery_date_timestamp"]) ."</p>
                    <p>" . $data["message"] . "»</p>
                </div>
                <div>" . $data["message"] . "</div>
                <div style='margin-top: 80px;width: 100%;text-align: center;'>
                    <a href='http://letter-to-the-future.tilda.ws/'>Написать другое письмо</a>
                </div>
            </div>
        </div>
        ";

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = $body;
        // $mail->AltBody = $_SERVER["DOCUMENT_ROOT"].'/local/templates/tinger/scripts/test/style/img/пример_письма.png';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}