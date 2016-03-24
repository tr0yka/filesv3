<?php

class Controller{

    public function model($name){
        if(file_exists("../app/models/{$name}Model.php")){
            include_once "../app/models/{$name}Model.php";
            $modelName = $name.'Model';
            return new $modelName();
        }else{
            new Exception('Модель не найдена');
        }
    }

    public function view($name,$data = null){
        if(file_exists("../app/views/{$name}.php")){
            if(is_array($data)) {
                extract($data);
            }
            include_once "../app/views/{$name}.php";
        }else{
            new Exception('Файл отображения не найден');
        }
    }

    public function config($name){
        if(file_exists("../app/configs/{$name}Config.php")){
            include_once "../app/configs/{$name}Config.php";
            $config = $name.'Config';
            return new $config();
        }else{
            new Exception('Конфигурационный файл не найден');
        }
    }


}