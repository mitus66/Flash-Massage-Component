# Flash-Massage-Component

Простой Flash-Massage-component

1. содержит класс FlashMassage:
class FlashMassage
{
    public $flashName; // string - имя флеш-сообщения
    public $content; // string - содержание флеш-сообщения

    // метод для передачи имени и содержания сообщения в сессию
    function set($flashName, $content)
    {
        $this->flashName = $flashName;
        $this->content = $content;

        // содержание флеш-сообщения помещается в имя сессионной переменной
        $_SESSION[$flashName] = $content;

        возвращает сессионную переменную в виде массива "имя", "содержание"
        return $_SESSION[$flashName];
    }

    // метод для получения содержания флеш-сообщения из сессионной переменной с соответствующим именем
    function display($flashName)
    {
        if(isset($_SESSION[$flashName])) {
            echo $_SESSION[$flashName]; // отображает содержание флеш-сообщения
            unset($_SESSION[$flashName]); // уничтожает соответствующую сессионную переменную
        }
    }
}

2. На странице передающей сообщение подключается сессия и файл класса компонента
session_start();
require 'FlashMassage.php';

затем создается экземпляр класса:
$flashMassage = new FlashMassage();

и вызывается метод класса set, с с соответствующими параметрами, например ('danger', 'Логин или пароль введены неверно') 
$flashMassage->set('danger', 'Логин или пароль введены неверно');
    
3. На странице принимающей сообщение подключается сессия и файл класса компонента
session_start();
require 'FlashMassage.php';

затем  создается экземпляр класса:
$flashMassage = new FlashMassage();

и вызывается метод класса display, с с соответствующими именем сессионной переменной выводимого сообщения
$flashMassage->display('danger');
