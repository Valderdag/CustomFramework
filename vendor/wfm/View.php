<?php

namespace wfm;

use RedBeanPHP\R;

class View
{
    public string $content = '';

    public function __construct(
        public $route,
        public $layout = '',
        public $view = '',
        public $meta = ''
    )
    {
        if (false !== $this->layout) {
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }
        $prefix = str_replace('\\', '/', $this->route['admin_prefix']);
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        if (is_file($view_file)) {
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        } else {
            throw new \Exception("Не найден вид <b>{$view_file}</b>", 500);
        }
        if (false !== $this->layout) {
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
        }
        if (is_file($layout_file)) {
            require_once $layout_file;
        } else {
            throw new \Exception("Не найден шаблон <b>{$layout_file}</b>", 500);
        }
    }

    /**
     * @return string
     */
    public function getMeta(): string
    {
        $out = '<title>' . rt($this->meta['title']) . '</title>' . PHP_EOL;
        $out .= '<meta name = "description" content = "' . rt($this->meta['description']) . '">' . PHP_EOL;
        $out .= '<meta name = "keywords" content = "' . rt($this->meta['keywords']) . '">' . PHP_EOL;
        return $out;
    }

    public function getBlock($block, $data = null)
    {
        if(is_array($data)){
            extract($data);
        }
        $block = APP . "/views/{$block}.php";
        if(is_file($block)){
            require $block;
        }else{
            echo "Не найден блок {$block} ";
        }
    }

    public function getDbLogs()
    {
        if (DEBUG) {
            $logs = R::getDatabaseAdapter()
                ->getDatabase()
                ->getLogger();
            $logs = array_merge($logs->grep('SELECT'), $logs->grep('select'), $logs->grep('INSERT'), $logs->grep('UPDATE'), $logs->grep('DELETE'));
            d($logs);
        }
    }
}