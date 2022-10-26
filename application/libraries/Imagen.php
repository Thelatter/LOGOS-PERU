<?php

class Imagen {

    private $_image;
    private $_imageType;
    private $_transparent;
    private $_validExtensions = array(
        IMAGETYPE_JPEG => 'image/jpeg',
        IMAGETYPE_GIF => 'image/gif',
        IMAGETYPE_PNG => 'image/png',
    );

    private function _imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct) {
        $cut = imagecreateTRUEcolor($src_w, $src_h);
        imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
        imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
        imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
    }

    private function _setPosicionMarcadeagua($ancho, $altura, $posicion = 'bottom right', $paddingH = 10, $paddingV = 10) {
        //_setPositionWatermark
        switch (strtolower($posicion)) {
            case 'top left':
                $h = $paddingH;
                $v = $paddingV;
                break;
            case 'top center':
                $h = ($this->getWidth() / 2) - ($ancho / 2) - $paddingH;
                $v = $paddingV;
                break;
            case 'top right':
                $h = $this->getWidth() - $ancho - $paddingH;
                $v = $paddingV;
                break;
            case 'middle left':
                $h = $paddingH;
                $v = ($this->getHeight() / 2) - ($altura / 2) - $paddingV;
                break;
            case 'middle center':
                $h = ($this->getWidth() / 2) - ($ancho / 2) - $paddingH;
                $v = ($this->getHeight() / 2) - ($altura / 2) - $paddingV;
                break;
            case 'middle right':
                $h = $this->getWidth() - $ancho - $paddingH;
                $v = ($this->getHeight() / 2) - ($altura / 2) - $paddingV;
                break;
            case 'bottom left':
                $h = $paddingH;
                $v = $this->getHeight() - $altura - $paddingV;
                break;
            case 'bottom center':
                $h = ($this->getWidth() / 2) - ($ancho / 2) - $paddingH;
                $v = $this->getHeight() - $altura - $paddingV;
                break;
            default:
                $h = $this->getWidth() - $ancho - $paddingH;
                $v = $this->getHeight() - $altura - $paddingV;
        }
        return array('horizontal' => $h, 'vertical' => $v);
    }

    public function ready_listo($Nombre_documento = null, $transparente = FALSE) {
        $this->setTransparent($transparente);

        if (!is_null($Nombre_documento)) {
            $this->cargar($Nombre_documento);
        }
    }

    public function setTransparent($bool) {
        $this->_transparent = (boolean) $bool;
    }

    public function getImageType() {
        return array_key_exists($this->_imageType, $this->_validExtensions) ? $this->_validExtensions[$this->_imageType] : null;
    }

    public function isValidExtension() {
        return array_key_exists($this->_imageType, $this->_validExtensions) ? TRUE : 'Invalid extension, you can upload only ' . implode(', ', $this->_validExtensions);
    }

    public function cargar($Nombre_documento) {
        //load
        $imageInfo = getimagesize($Nombre_documento);
        $this->_imageType = $imageInfo[2];

        if ($this->_imageType == IMAGETYPE_JPEG) {
            $this->_image = imagecreatefromjpeg($Nombre_documento);
        } elseif ($this->_imageType == IMAGETYPE_GIF) {
            $this->_image = imagecreatefromgif($Nombre_documento);
        } elseif ($this->_imageType == IMAGETYPE_PNG) {
            $this->_image = imagecreatefrompng($Nombre_documento);
        }
    }

    public function guardar($Nombre_documento, $compresión = 75, $permisos = null) {
        //save
        if ($this->_imageType == IMAGETYPE_JPEG) {
            imagejpeg($this->_image, $Nombre_documento, $compresión);
        } elseif ($this->_imageType == IMAGETYPE_GIF) {
            imagegif($this->_image, $Nombre_documento);
        } elseif ($this->_imageType == IMAGETYPE_PNG) {
            imagepng($this->_image, $Nombre_documento);
        }

        if (!is_null($permisos)) {
            chmod($Nombre_documento, $permisos);
        }
    }

    public function agregar_encabezado_tipo() {
        // TODO: Agregar encabezados según el tipo de imagen
        if ($this->_imageType == IMAGETYPE_JPEG) {
            imagejpeg($this->_image);
        } elseif ($this->_imageType == IMAGETYPE_GIF) {
            imagegif($this->_image);
        } elseif ($this->_imageType == IMAGETYPE_PNG) {
            imagepng($this->_image);
        }
    }

    public function getWidth() {
        //ancho
        return imagesx($this->_image);
    }

    public function getHeight() {
        //altura
        return imagesy($this->_image);
    }

    public function CambiarToaltura($altura) {
        //resizeToHeight
        if ($altura < $this->getHeight()) {
            $ratio = $altura / $this->getHeight();
            $ancho = $this->getWidth() * $ratio;
            $this->cambio_de_tamanio($ancho, $altura);
        } else {
            $this->cambio_de_tamanio($this->getWidth(), $this->getHeight());
        }
    }

    public function CambiarToancho($altura) {
        //resizeToWidth
        if ($altura < $this->getWidth()) {
            $ratio = $altura / $this->getWidth();
            $height = $this->getHeight() * $ratio;
            $this->cambio_de_tamanio($altura, $height);
        } else {
            $this->cambio_de_tamanio($this->getWidth(), $this->getHeight());
        }
    }

    public function escala($scale) {
        //scale
        $ancho = $this->getWidth() * $scale / 100;
        $altura = $this->getHeight() * $scale / 100;
        $this->cambio_de_tamanio($ancho, $altura);
    }

    public function cambio_de_tamanio($ancho, $altura) {
        //resize
        $newImage = imagecreateTRUEcolor($ancho, $altura);
        if ($this->_imageType == IMAGETYPE_PNG && $this->_transparent === TRUE) {
            imagealphablending($newImage, FALSE);
            imagesavealpha($newImage, TRUE);
            imagefilledrectangle($newImage, 0, 0, $ancho, $altura, imagecolorallocatealpha($newImage, 255, 255, 255, 127));
        } elseif ($this->_imageType == IMAGETYPE_GIF && $this->_transparent === TRUE) {
            $index = imagecolortransparent($this->_image);
            if ($index != -1 && $index != 255) {
                $colors = imagecolorsforindex($this->_image, $index);
                $transparent = imagecolorallocatealpha($newImage, $colors['red'], $colors['green'], $colors['blue'], $colors['alpha']);
                imagefill($newImage, 0, 0, $transparent);
                imagecolortransparent($newImage, $transparent);
            }
        }
        imagecopyresampled($newImage, $this->_image, 0, 0, 0, 0, $ancho, $altura, $this->getWidth(), $this->getHeight());
        $this->_image = $newImage;
    }

    public function cambioToajuste($ancho, $altura, $margins = FALSE, $hexBckColor = '000000') {
        //resizeToFit
        $ratioW = $ancho / $this->getWidth();
        $ratioH = $altura / $this->getHeight();
        $ratio = ($margins === FALSE) ? max($ratioW, $ratioH) : min($ratioW, $ratioH);
        $newW = floor($this->getWidth() * $ratio);
        $newH = floor($this->getHeight() * $ratio);

        $this->cambio_de_tamanio($newW, $newH);

        if ($newW != $ancho || $newH != $altura) {
            $newImage = imagecreateTRUEcolor($ancho, $altura);
            imagefill($newImage, 0, 0, "0x$hexBckColor");

            $ox = ($newW > $ancho) ? floor(($newW - $ancho) / 2) : 0;
            $oy = ($newH > $altura) ? floor(($newH - $ancho) / 2) : 0;
            $dx = ($newW < $ancho) ? floor(($ancho - $newW) / 2) : 0;
            $dy = ($newH < $altura) ? floor(($altura - $newH) / 2) : 0;

            imagecopy($newImage, $this->_image, $dx, $dy, $ox, $oy, $newW, $newH);
            $this->_image = $newImage;
        }
    }

    public function imgenMarcadeagua($imgen, $opacidad = 100, $posicion = 'bottom right', $paddingH = 10, $paddingV = 10) {
        //imgWatermark
        $iw = getimagesize($imgen);
        $ancho = $iw[0];
        $altura = $iw[1];

        $p = $this->_setPosicionMarcadeagua($ancho, $altura, $posicion, $paddingH, $paddingV);

        imagealphablending($this->_image, TRUE);
        $watermark = imagecreatefrompng($imgen);
        $this->_imagecopymerge_alpha($this->_image, $watermark, $p['horizontal'], $p['vertical'], 0, 0, $ancho, $altura, $opacidad);
        imagedestroy($watermark);

        return $this->_image;
    }

    public function stringMarcadeagua($string, $opacidad = 100, $color = '000000', $posicion = 'bottom right', $paddingH = 10, $paddingV = 10) {
        //stringWatermark
        $ancho = imagefontwidth(5) * strlen($string);
        $altura = imagefontwidth(5) + 10;

        $p = $this->_setPosicionMarcadeagua($ancho, $altura, $posicion, $paddingH, $paddingV);

        $watermark = imagecreateTRUEcolor($ancho, $altura);
        imagealphablending($watermark, FALSE);
        imagesavealpha($watermark, TRUE);
        imagefilledrectangle($watermark, 0, 0, $ancho, $altura, imagecolorallocatealpha($watermark, 255, 255, 255, 127));

        imagestring($watermark, 5, 0, 0, $string, "0x$color");
        $this->_imagecopymerge_alpha($this->_image, $watermark, $p['horizontal'], $p['vertical'], 0, 0, $ancho, $altura, $opacidad);

        return $this->_image;
    }

}
