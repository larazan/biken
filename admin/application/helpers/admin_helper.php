<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = PROTOCOL;
        $config['mailpath'] = MAIL_PATH;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['mailpath'] = MAIL_PATH;
        $config['charset'] = 'UTF-8';
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        // pre($detail);
        // die;
        
        $CI = setProtocol();        
        
        $CI->email->from(EMAIL_FROM, FROM_NAME);
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

if(!function_exists('get_nice_date'))
{
    function getNiceDate($timestamp, $format) {
        switch ($format) {
            case 'full':
                $the_date = date('l jS \of F Y \a\t h:i:s A', $timestamp);
                break;
            case 'cool':
                $the_date = date('l jS \of F Y', $timestamp);
                break;
            case 'shorter':
                $the_date = date('jS \of F Y', $timestamp);
                break;
            case 'mini':
                $the_date = date('jS M Y', $timestamp);
                break;
            case 'oldschool':
                $the_date = date('j\/n\/y', $timestamp);
                break;
            case 'datepicker':
                $the_date = date('m\/d\/Y', $timestamp);
                break;
            case 'indo':
                $the_date = date('d\/m\/Y', $timestamp);
                break; 
            case 'indo2':
                $the_date = date('d-m-Y', $timestamp);
                break; 
            case 'indon':
                $the_date = date('l, d F Y', $timestamp);
                break;  
            case 'indon2':
                $the_date = date('d F Y', $timestamp);
                break;            
            case 'monyear':
                $the_date = date('F Y', $timestamp);
                break;      
            case 'lengkap':
                $the_date = date('d F Y \/ h:i:s A', $timestamp);
                break;
            case 'keren':
                $the_date = date('l d F Y', $timestamp);
                break; 
            case 'ok':
                $the_date = date('d-M-Y', $timestamp);
                break;     
            case 'ok2':
                $the_date = date('d M Y', $timestamp);
                break;     
            case 'countdown':
                $the_date = date('Y/m/d h:i:s', $timestamp);
                break;  
            case 'timer':
                $the_date = date('F d Y h:i:s', $timestamp);
                break;  
            case 'dataDate':
                $the_date = date('Y-m-d', $timestamp);
                break;
            case 'dataTime':
                $the_date = date('h:i:s', $timestamp);
                break;         
        }
        return $the_date;
    }
}

?>