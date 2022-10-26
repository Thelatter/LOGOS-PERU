<?php

class Sendmail {
        
    private $_items = array();
    
    public function __construct() {
        $this->ci =& get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('parser', 'pagination');
        $helper = array('url', 'form');
        $model = array();
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->ci->config->load('exportando', TRUE, TRUE);
    }
    
    public function load($data, $view){
        foreach($data as $key => $value){
            $this->$key = $value;
        }
        $this->_items = $data;
        $this->_view = $view;
    }
    
    public function success_smtp(){
        include  APPPATH.'third_party/phpmailer/phpmailer.php';
        $phpmailer = new phpmailer();
        $mail = $this->ci->config->item('list_email', 'exportando');
        $body = $this->ci->parser->parse('plugins/'.$this->_view, $this->_items, TRUE);
        try {
            $phpmailer->IsSMTP();
            /*$phpmailer->SMTPDebug = 2;*/
            $phpmailer->SMTPAuth = TRUE;
            $phpmailer->SMTPSecure = $this->smtp_secure;
            $phpmailer->Host = $this->smtp_host;
            $phpmailer->Port = $this->smtp_port;
            $phpmailer->Username = $this->smtp_username;
            $phpmailer->Password = $this->smtp_password;
            $phpmailer->AddReplyTo($this->email, $this->name);
            $i = 0;
            foreach($mail as $key => $value){
                if($i == 0) {
                    $phpmailer->AddAddress($value, $key);
                } else {
                    $phpmailer->AddCC($value, $key);
                }
                $i++;
            }
            $phpmailer->SetFrom($this->email, $this->name);
            $phpmailer->AddReplyTo($this->email, $this->name);
            $phpmailer->Subject = $this->subject;
            $phpmailer->AltBody = 'Si ve este mensaje, por favor use un HTML compatible.';
            $phpmailer->MsgHTML($body);
            $phpmailer->CharSet = 'UTF-8';
            $phpmailer->Send();
            return TRUE;
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    


    public function success_sendmail2($email){
        include  APPPATH.'third_party/phpmailer/phpmailer.php';
        $phpmailer = new phpmailer();
        $mail = $email;
        $body = $this->ci->parser->parse('plugins/'.$this->_view, $this->_items, TRUE);
        try {
            /*$phpmailer->IsSendmail();*/
            $phpmailer->AddReplyTo($this->email, $this->name);
            $i = 0;
            foreach($mail as $key => $value){
                if($i == 0) {
                    $phpmailer->AddAddress($value, $key);
                } else {
                    $phpmailer->AddCC($value, $key);
                }
                $i++;
            }
            $phpmailer->SetFrom($this->email, $this->name);
            $phpmailer->AddReplyTo($this->email, $this->name);
            $phpmailer->Subject = $this->subject;
            $phpmailer->AltBody = 'Si ve este mensaje, por favor use un HTML compatible.';
            $phpmailer->MsgHTML($body);
            $phpmailer->CharSet = 'UTF-8';
            $phpmailer->Send();
            return TRUE;
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    public function success_sendmail($email){
        include  APPPATH.'third_party/phpmailer/phpmailer.php';
        $phpmailer = new phpmailer();
        $mail = $email;
        $body = $this->ci->parser->parse('plugins/'.$this->_view, $this->_items, TRUE);
        try {
            /*$phpmailer->IsSendmail();*/
            $phpmailer->AddReplyTo($this->email, $this->name);
            $i = 0;
            foreach($mail as $key => $value){
                    //$phpmailer->AddAddress($value, $key);
                    $phpmailer->SetFrom($this->email, $this->name);
            $phpmailer->AddAddress($value, $key);
                $phpmailer->Subject = $this->subject;
                $phpmailer->AltBody = 'Si ve este mensaje, por favor use un HTML compatible.';
                $phpmailer->MsgHTML($body);
                $phpmailer->CharSet = 'UTF-8';
                $phpmailer->Send();
                $phpmailer->ClearAllRecipients();

            }
            return TRUE;
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /*-------------FIN--------------*/
}
