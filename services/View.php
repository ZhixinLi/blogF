<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 11:34
 */
class View {
    const VIEW_BASE_PATH = '/app/views/';

    public $view;
    public $data;

    public function __construct($view) {
        $this->view = $view;
    }

    public static function make($viewName = null) {
        if (!$viewName) {
            throw new InvalidArgumentException("视图名称不能为空！");
        } else {

            $viewFilePath = self::getFilePath($viewName);
            if (is_file($viewFilePath)) {
                return new View($viewFilePath);
            } else {
                throw new UnexpectedValueException("视图文件不存在！");
            }
        }
    }

    public function with($key, $value = null) {
        $this->data[$key] = $value;
        return $this;
    }

    public function paginate($page, $limit, $count, $url, $param_arr = null) {
        $this->data['paginator'] = Paginator::data($page, $limit, $count, $url, $param_arr);
        return $this;
    }

    private static function getFilePath($viewName) {
        $filePath = str_replace('.', '/', $viewName);
        return BASE_PATH . self::VIEW_BASE_PATH . $filePath . '.php';
    }

    public function __call($method, $parameters) {
        if (starts_with($method, 'with')) {
            return $this->with(snake_case(substr($method, 4)), $parameters[0]);
        }

        throw new BadMethodCallException("方法 [$method] 不存在！.");
    }
}