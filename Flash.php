<?php
class Flash
{
    private $key = 'flash_message';
    
    public function set($type, $message, $page)
    {
        $_SESSION[$this->key][$page] = [
            'type' => ($type === 'success')? 'success': 'error',
            'message' => $message,
        ];
    }

    public function get($page)
    {
        return (isset($_SESSION[$this->key][$page]))? $_SESSION['flash_message'][$page] : false;
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