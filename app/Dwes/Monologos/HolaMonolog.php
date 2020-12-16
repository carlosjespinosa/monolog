<?php
declare(strict_types=1);
namespace Dwes\Monologos;

use Monolog\Handler\RotatingFileHandler;         //********** Añadir el FirePHP
use Monolog\Logger;

/**
 * Clase que representa mi intento fallido de entender algo
 * 
 * Esta clase gestiona los logs del HolaMonolog, y guarda los mensajes
 * en un documento log.log
 * 
 * @package Dwes\Monologos
 * @author Carlos J. Espinosa Tur
 */

class HolaMonolog{

    private $log; 

    /**
     *Hora del sistenma, aunque nunca debió ser así...
     *@var string<HolaMonolog>
    */ 
    private $hora;          //No entiendo bien la comprobación de hora menor de 0 y mayor de 24 con el Warning
   
    /**
     *Constructor que apila los manejadores
     *@param void
     *@return void 
     */   
    function __construct()
    {        
      $this->log = new Logger("Logger Videoclub");
      $this->log->pushHandler(new RotatingFileHandler("logs/log.log",100,Logger::WARNING));  //Sigue cogiendo el mensaje de debug, no se muy bien qué hago aqui
      $this->log->pushHandler(new RotatingFileHandler("logs/log.log",100,Logger::INFO));
      $this->log->debug("Debug 2.0");
      $this->hora = date("G");      //Hora de 0 a 23

      if($this->hora < 0 || $this->hora > 23){
          $this->log->warning("Ojito con la hora...");
      }

    }

    /**
     * Método que nos saluda si la hora así lo determina
     * @param void
     * @return void
     */
    function saludar(){                         //Solo graba mensaje de saludo entre las 7 y las 23
       
        if ($this->hora > 19 ){
            $this->log->info("Buenas noches");
        }elseif ($this->hora > 13){
            $this->log->info("Buenos tardes");
        }elseif ($this->hora > 6){
            $this->log->info("Buenos días");
        }
        
    }

    /**
     * Método que nos despide si la hora así lo determina
     * @param void
     * @return void
     */
    function despedir(){                        //Solo graba mensaje de despedida entre las 0 y las 6
       
        if ($this->hora >= 0 && $this->hora < 7){
            $this->log->info("Adios con el corasón");
        }    
        
    }
}