<?php

use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Model\SendSmtpEmail;

class BrevoEmails
{  
    protected $apiInstance;

    public function __construct($apiKey = null)
    {
        if (!$apiKey) {
            $apiKey = BREVO_API_KEY;
        }

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $apiKey);
        $this->apiInstance = new TransactionalEmailsApi(null, $config);
    }

    // Replace Variables from string
    public function replace_email_vars($str, $vars = [], $is_email_body = false)
    {
        foreach ($vars as $var => $value) {
            $var = strtoupper($var);
            if (!$is_email_body && function_exists('replaceBreaksToBr')) {
                $value = replaceBreaksToBr($value);
            }
            $var = "_:SS_" . $var . "_VAR:_";
            $str = str_replace($var, $value, $str);
        }
        return $str;
    }

    // Read Email File
    public function get_data_from_file($filename, $vars = [])
    {
        $filepath = _DIR_ . "includes/Classes/templates/" . $filename;
        if (!is_file($filepath)) {
            return null;
        }

        $file_data = file_get_contents($filepath);
        $vars = array_merge([
            'SITE_URL' => SITE_URL,
            'SITE_NAME' => SITE_NAME,
            'SITE_EMAIL' => SITE_EMAIL,
        ], $vars);
        $file_data = $this->replace_email_vars($file_data, $vars, true);

        return $file_data;
    }

    // Get Email Structure (if you have global wrapper)
    public function get_email_structure()
    {
        return $this->get_data_from_file('email_structure.html');
    }

    // Read Template file with wrapper
    public function readTemplateFile($filename, $vars = [])
    {
        $email_body = $this->get_data_from_file($filename, $vars);

        $email_structure = $this->get_email_structure();
        if ($email_structure) {
            $file_data = $this->replace_email_vars($email_structure, [
                'email_body' => $email_body
            ], true);
        } else {
            $file_data = $email_body;
        }

        return $file_data;
    }

    // Send wrapper
    public function send($options)
    {
        $templateKey = arr_val($options, 'template');
        $to = $options['to'];
        $subject = arr_val($options, 'subject');
        $vars = arr_val($options, 'vars', []);

        if ($templateKey) {
            if (!isset(EMAILS[$templateKey])) {
                return error("Template not found in emails");
            }

            $template = EMAILS[$templateKey];
            $filename = $template['filename'];
            if (!$subject) {
                $subject = $template['subject'];
            }

            $body = $this->readTemplateFile($filename, $vars);

            if (arr_val($options, 'return_html', false)) {
                return $body;
            }

            return $this->sendEmailTo([
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
            ]);
        }

        return false;
    }

    // Actual Brevo send
    public function sendEmailTo($data)
    {
        try {
            $toList = [];
            if (isset($data['to'][0]) && is_array($data['to'][0])) {
                // multiple recipients
                foreach ($data['to'] as $t) {
                    $toList[] = [
                        'email' => $t['email'],
                        'name' => $t['name'] ?? ''
                    ];
                }
            } else {
                // single
                $toList[] = [
                    'email' => $data['to']['email'] ?? $data['to'],
                    'name'  => $data['to']['name'] ?? ''
                ];
            }

            $sendSmtpEmail = new SendSmtpEmail([
                'subject' => $data['subject'],
                'sender' => [
                    'email' => SITE_EMAIL,
                    'name' => SITE_NAME
                ],
                'to' => $toList,
                'htmlContent' => $data['body'],
            ]);

            $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
            return $result;
        } catch (\Exception $e) {
            return error("Exception when sending email via Brevo: " . $e->getMessage());
        }
    }
}

$_email = new BrevoEmails();