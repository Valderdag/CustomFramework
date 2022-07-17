<?php

namespace wfm;

abstract class Controller
{
    public array $data = [];
    public array $meta = [];
    public false|string $layout = '';
    public string $view = '';
    public object $model;

    public function __construct(public $route = [])
    {

    }

    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
        return true;
    }

    /**
     * @param array $data
     */
    public function set(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param array|string[] $meta
     */
    public function setMeta($title = '', $description = '', $keywords = ''): void
    {
        $this->meta =
            [
                'title' => $title,
                'description' => $description,
                'keywords' => $keywords,
            ];
    }
}