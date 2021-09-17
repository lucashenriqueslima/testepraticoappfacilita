<?php

    namespace Source;

    class Router
    {   

        private array $handlers;
        private $notFound;
        private $className = SITE["className"];
        private const METHOD_POST = 'POST';
        private const METHOD_GET = 'GET';


        /**
         * Método responsável por retornar requisições GET
         *
         * @param string $path
         * @param mixed $handler
         * @return void
         */
        public function get(string $path, $handler): void
        {   
       
            $path = rtrim($_SERVER['REQUEST_URI'], "/ ")."$path";
            $this->addHandler(self::METHOD_GET, $path, $handler);
        }


        /**
         * Método responsável por retornar requisições POST
         *
         * @param string $path
         * @param mixed $handler
         * @return void
         */
        public function post(string $path, $handler): void
        {
            $path = rtrim($_SERVER['REQUEST_URI'], "/ ")."$path";
            $this->addHandler(self::METHOD_POST, $path, $handler);
            
        }


        /**
         * Método responsável por adicionar os parâmetros necessários para a chamada da function
         *
         * @param string $method
         * @param string $path
         * @param mixed $handler
         * @return void
         */
        private function addHandler(string $method, string $path, $handler): void
        {
            $this->handlers[$method . $path] = [
                'path' => $path,
                'method' => $method,
                'handler' => $handler
            ];
        }


        /**
         * Método responsável por retornar 404 error not found
         *
         * @param mixed $handler
         * @return void
         */
        public function notFound($handler):void
        {
            $this->notFound = $handler; 
        }


        /**
         * Método responsável por chamar a function solicitada
         *
         * @return void
         */
        public function run():void
        {   
            
            $requestUri = parse_url($_SERVER["REQUEST_URI"]);
            $requestPath =  $requestUri['path'];
            
            $method = $_SERVER['REQUEST_METHOD'];

            $callback = null;

            foreach($this->handlers as $handler)
            {
                if($handler['path'] === $requestPath && $method === $handler['method']){
                    $callback = $handler['handler'];
                }
            }

            if(is_string($callback)){

                $parts = explode(':', $callback);
                if(is_array($parts)){
                    $this->className .= current($parts);
                    $handler = new $this->className;
                    $method = end($parts);

                    $callback = [$handler, $method];
                }
            }

            if(!$callback){
                header("HTTP/1.0 404 Not Found");
                if(!empty($this->notFound)){
                    $callback = $this->notFound;
                }
            }
          
            call_user_func_array($callback, [
                array_merge($_GET, $_POST)
            ]);
        }

    }