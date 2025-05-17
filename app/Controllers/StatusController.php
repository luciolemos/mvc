<?php


namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use PHPMailer\PHPMailer\PHPMailer;
use Dotenv\Dotenv;

class StatusController extends Controller
{
    public function index()
    {
        $status = [
            'env' => file_exists(__DIR__ . '/../../.env'),
            'db' => false,
            'smtp' => false,
            'recaptcha' => false
        ];

        // Banco de Dados
        try {
            Database::connect();
            $status['db'] = true;
        } catch (\Exception $e) {}

        // SMTP com PHPMailer
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASS'];
            $mail->Port = $_ENV['SMTP_PORT'];
            $mail->smtpConnect(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
            $status['smtp'] = true;
        } catch (\Exception $e) {}

        // Google reCAPTCHA
        try {
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $_ENV['RECAPTCHA_SECRET_KEY'] . "&response=fake");
            if (strpos($response, 'invalid-input-response') !== false || strpos($response, 'timeout-or-duplicate') !== false || strpos($response, 'missing-input-response') !== false) {
                $status['recaptcha'] = true;
            }
        } catch (\Exception $e) {}

        $this->view('admin/status', ['status' => $status]);
    }
}
