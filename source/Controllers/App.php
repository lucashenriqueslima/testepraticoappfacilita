<?php 

    namespace Source\Controllers;

    class App extends Controller
    {

        /**
         * Class constructor.
         */
        public function __construct()
        {
            $this->template = views("/_app_template");
        }
       
        /**
         * Método responsável por retornar tudo da home
         *
         * @return void
         */
        public function home()
        {
            
            /**
             * Exercício 01
             */
            $juca = 1.10;
            $chico = 1.50;

            for($i = 0; $juca < $chico; $i++){
                
                $juca += 0.03;
                $chico += 0.02;
            }

            /**
             * Exercício 2
             */
        
                for($j=0;$j<=24;$j++) {
                  $matriz_impar[$j] = rand(1, 100)*2 + 1;
                  $matriz_par[$j] = rand(1, 100)*2;
                }

            
            parent::render("/home", [
                "title" => site('name')."Home",
                "ex1" => $i,
                "matriz_impar" => $matriz_impar,
                "matriz_par" => $matriz_par,
            ]);
        }

    }