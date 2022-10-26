<?php

class Codigo_producto {

    public function generar_codigo_qr($id, $type) {
        if ($id == '') {
            return '';
        } else {
            $this->ci = & get_instance();
            $this->ci->load->library('ciqrcode');
            $this->ci->load->helper('url');
            $params['data'] = $id;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = './public/images/qrcode/qrcode_' . $type . '_' . $id . '.png';
            $this->ci->ciqrcode->generate($params);
            $p_qrcode = '<img src="' . base_url() . 'public/images/qrcode/qrcode_' . $type . '_' . $id . '.png" />';
            return $p_qrcode;
        }
    }

    public function generar_codigo_barra($id, $type) {
        if ($id == '') {
            return '';
        } else {
            $this->ci = & get_instance();
            $this->ci->load->library('barcode');
            $this->ci->load->helper('url');
            $this->ci->barcode->barcode();
            $this->ci->barcode->setType('C128');
            $this->ci->barcode->setCode($id);
            $this->ci->barcode->setSize(80, 200);
            $file = './public/images/barcode/barcode_' . $id . '_' . $type . '.png';
            $this->ci->barcode->writeBarcodeFile($file);
            return '<img src="' . base_url() . 'public/images/barcode/barcode_' . $id . '_' . $type . '.png" />';
        }
    }

}
