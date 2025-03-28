<?php
    function func1(){
        try{
            func2();
        }catch(Exception $e){
            echo 'Поймано исключение "'.$e->getMessage().'"';
        }
        echo 'А теперь выполнится этот код';
    }
    function func2(){
        func3();
    }
    function func3(){
        throw new Exception('Ошибка подключения к БД');
        echo "Этот код выполниться только после обработки исключения";
    }

    func1();