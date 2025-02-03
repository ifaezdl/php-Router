<?php 
declare(strict_types=1);
namespace Router;

class Router {
    

        public function __construct() {
            // echo "Router initialized!";
        }
        private array $routes = [];

        public function add(string $method, string $path, array $controller) {
            
        $path = $this->normalizePath($path);
        $this->routes[] = [
        'path' => $path,
        'method' => strtoupper($method),
        'controller' => $controller,
        'middlewares' => []
        ];


        }
        
        private function normalizePath(string $path): string {
            $path = trim($path, '/');
            $path = "/{$path}/";
            $path = preg_replace('#[/]{2,}#', '/', $path);
            return $path;

        }

        public function dispatch(string $path) {
            $path = $this->normalizePath($path);
            $method = strtoupper($_SERVER['REQUEST_METHOD']);
            foreach ($this->routes as $route) {
                if (!preg_match("#^" . preg_replace('/\{id\}/', '(\d+)', $route['path']) . "$#", $path, $matches) ||
                $route['method'] !== $method)
                {
                    continue;
                }
       
                [$class, $function] = $route['controller'];
                $controllerInstance = new $class();
                if (isset($matches[1])){

                    $controllerInstance->$function($matches[1]);
                }
                else{
                    $controllerInstance->$function();
                }
      
  

        }

    } 
} 
?>