<?php
class Flash
{
    private $key = 'flash_message';
    private $types = ['success', 'error'];

    public function set($type, $message, $page)
    {
        if(!in_array($type, $this->types)) trigger_error("Invalid type", E_USER_ERROR);

        return $_SESSION[$this->key][$page] = [
            'type' => ($type === 'success')? 'success': 'error',
            'message' => $message,
        ];
    }

    public function get($page)
    {
        $message = (isset($_SESSION[$this->key][$page]))? $_SESSION[$this->key][$page] : false;
        if($message) unset($_SESSION[$this->key][$page]);
        return $message;
    }

    public function display($page)
    {
        $flash = $this->get($page);
        if(!$flash) return false;?>

        <div class="alert alert-<?php echo (($flash['type'] === 'error')? 'danger' : $flash['type'] );?> text-dark" role="alert">
            <strong>Уведомление!</strong> <?php echo $flash['message'];?>
        </div>

        <?php

    }
}