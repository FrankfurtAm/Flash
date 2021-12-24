<?php
class Flash
{
    private $key = 'flash_message';
    private $types = ['success', 'error'];

    /** 
        Parameters: 
            string - $type (Message status) 
            string - $message (Any message that you want to display on the site)
            string - $page (The page on which you want to display the message)

        Description: Set message for page

        Return value: bool
    **/

    public function set(string $type, string $message, string $page)
    {
        if(!in_array($type, $this->types)) trigger_error("Invalid type", E_USER_ERROR);

        return $_SESSION[$this->key][$page] = [
            'type' => ($type === 'success')? 'success': 'error',
            'message' => $message,
        ];
    }

    /** 
        Parameters: 
            string - $page (The page where you want to receive a flash message)

        Description: Get message for page

        Return value: array : false
    **/

    public function get(string $page)
    {
        $message = (isset($_SESSION[$this->key][$page]))? $_SESSION[$this->key][$page] : false;
        if($message) unset($_SESSION[$this->key][$page]);
        return $message;
    }

    /** 
        Parameters: 
            string - $page (The page where you want to receive a flash message)

        Description: Display message in page

        Return value: null
    **/

    public function display(string $page)
    {
        $flash = $this->get($page);
        if(!$flash) return false;?>

        <div class="alert alert-<?php echo (($flash['type'] === 'error')? 'danger' : $flash['type'] );?> text-dark" role="alert">
            <strong>Уведомление!</strong> <?php echo $flash['message'];?>
        </div>

        <?php
    }
}