<?php

namespace Core;

defined('ROOTPATH') or exit("Access Denied");

class Request
{
    public $upload_max_size = 20;
    public $upload_folder = 'uploads';
    public $upload_errors = [];
    public $upload_error_code = 0;
    public $file_errors          = [];

    public $upload_file_types = [
        'image/jpeg',
        'image/png',
        'image/webp',
        'image/gif',
    ];


    public function method(): string
    {
        return $_SERVER["REQUST_METHOD"];
    }
    public function posted(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            return true;
        }
        
        return false;
    }
    public function post(string $key = '', mixed $default = ''): mixed
    {
        if (empty($key)) {
            return $_POST;
        } else {
            if (isset($_POST[$key])) {
                return $_POST[$key];
            }
        }
        return $default;
    }
    public function files(string $key = '', mixed $default = ''): mixed
    {
        if (empty($key)) {
            return $_FILES;
        } else {
            if (!empty($_FILES[$key])) {
                return $_FILES[$key];
            }
        }
        return '';
    }
    public function get(string $key = '', mixed $default = ''): mixed
    {
        if (empty($key)) {
            return $_GET;
        } else {
            if (isset($_GET[$key])) {
                return $_GET[$key];
            }
        }
        return $default;
    }
    public function input(string $key = '', mixed $default = ''): mixed
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        return $default;
    }
    public function all(): mixed
    {
        return $_REQUEST;
    }

    public function upload_files(?string $key = ''): string|array
    {
        $this->upload_errors          = [];
        $this->upload_error_code  = 0;
        $uploaded = empty($key) ? [] : '';
        $filename = array_column($this->files(), 'name');
       
        $found = false;
        foreach ($filename as $i => $value) {
            # code...
            if(!empty($value)){
              
                $found = true;
                break;
            }
        }

        if (!$found){           
            return $uploaded;
}


        $get_one = false;

        if (!empty($key))
            $get_one = true;

       
        $uploaded = [];

        foreach ($this->files() as $ikey => $file_arr) {

            if ($file_arr['error'] > 0) {
                $this->upload_error_code = $file_arr['error'];
                $this->upload_errors[$ikey] = 'An error occur with the file: ' . $file_arr['name'];
                continue;
            }
            if (!in_array($file_arr['type'], $this->upload_file_types)) {
                $this->upload_errors[$ikey] = 'Invalid file type: ' . $file_arr['name'];
                continue;
            }
            if ($file_arr['size'] > $this->upload_max_size * 1024 * 1024) {
                $this->upload_errors[$ikey] = 'The file too large: ' . $file_arr['name'];
                continue;
            }

            $folder = trim($this->upload_folder, '/') . '/';
            $destination = $folder . $file_arr['name'];

            $num = 0;
            while (file_exists($destination) && $num < 10) {
                $num++;
                $ext = explode('.', $destination);
                $ext = end($ext);
                $destination = preg_replace("/\.$ext$/", '_' . rand(0, 9) . ".$ext", $destination);
            }
            if (!is_dir($folder))
                mkdir($folder, 0777, true);
            move_uploaded_file($file_arr['tmp_name'], $destination);
            $uploaded[] = $destination;
           
            if ($get_one)
                break;
        }
        if ($get_one)
            return $uploaded[0] ?? '';



        return $uploaded;
    }
}
