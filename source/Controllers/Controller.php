<?php 

    namespace Source\Controllers;

    abstract class Controller
    {   

        protected $template;
        
        /**
         * Função responsável por renderizar views e passar variáveis.
         *
         * @param string $content
         * @param array $vars
         * @return void
         */
        public function render($content, $vars = []):void
        {   

            $content = views($content);
            if(file_exists($content)){
                extract($vars);
                include($this->template);
            }
        }

        /**
         * Função responsável por passar vars do php para o js
         *
         * @param string|null $param
         * @param array|null $values
         * @return string
         */
        public function ajaxResponse(string $param = null, array $values = null): string
        {
            return json_encode([$param => $values]);
        }


        
    }
