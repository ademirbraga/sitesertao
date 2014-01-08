<?php
/**

 * Classe do sistema para trabalhar com upload.

 *

 * @category Classe

 * @name ../_inc/_php/_class/Upload.class.php

 * @copyright [Informaï¿½ï¿½es de Direitos de Cï¿½pia]

 * @license [link da licenï¿½a] [Nome da licenï¿½a]

 * @link [link de onde pode ser encontrado esse arquivo]

 * @version 1.0.0

 */

class Upload {



    public $arquivo;

    private $_extension;

    public $objZip;



    function __construct() {

        $this->objZip = new ZipArchive();

    }



    /**

     * @param string $extensionsAllowed Extensï¿½es permitidas, exemplo de formato permitidos: txt|csv|xls|xlsx

     */

    function getExtension($extensionsAllowed) {



        $extensionsAllowed = trim($extensionsAllowed);

        preg_match("/\.($extensionsAllowed){1}$/i", $this->arquivo, $ext);



        if (!count($ext))

            return false;

        else {

            $this->_extension = "." . strtolower($ext[1]);

            return $this->_extension;

        }

    }



    /**

     * @param string $file arquivo tipo $_FILE, exemplo $_FILES['Filedata']

     * @param string $folder local de destino do arquivo

     */

    public function doUpload($file, $folder) {



        // Seta o limite de execuï¿½ï¿½o em zero para evitar erros

        set_time_limit(0);


        $nomeArquivo = uniqid() . "-" . date('d-m-Y') . $this->_extension;
    
        $resultUpload = move_uploaded_file($file, $folder.$nomeArquivo);

        if (!$resultUpload) {

            return false;

        } else {

            return $nomeArquivo;

        }

    }



    public function upload_progress($progress) {



        if ($progress)

            return uploadprogress_get_info($progress);



        return false;

    }



    /**

     * @name unzipFile

     * @param string $arquivo

     * @return boolean

     * @desc Metodo para descompactar arquivos .ZIP     

     * @version 1.0

     * @data 07/07/2013 

     */

    function unzipFile($path=PATH_UPLOAD,$arquivo='x.zip') {



        if (file_exists($path.'/'.$arquivo)) {

            $res = $this->objZip->open($path.'/'.$arquivo);

            if ($res == true) {

                

                $this->objZip->extractTo($path);

                return true;

                

            } else {

                return false;

            }

        }

        return false;

    }



    /**

     * @name closeZip

     * @desc Metodo para fechar o objeto

     * @data 07/07/2013

     * @version 1.0

     */

    function closeZip() {

        $this->objZip->close();

    }



    /**

     * @name deleteFile

     * @param string $filename

     * @desc Metodo para apagar um arquivo do diretorio

     * @data 07/07/2013

     * @version 1.0

     */

    function deleteFile($filename='x.csv') {

        @unlink($filename);

    }

}
?>