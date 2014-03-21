<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * converteDataBR
 *
 * converte uma data válida do formato US
 * para o formato BR
 *
 * @access    public
 * @param     string $data
 * @return    string $dataBR  
 */

if (! function_exists('converteDataBR'))
{
    function converteDataBR($data)
    {
        if(validaDataUS($data)){
            list($mes,$dia,$ano) = explode('-', $data);
            return $dia.'/'.$mes.'/'.$ano;
        }else{
            //log_message('error', 'Argumento inválido inserido para data, na função converteDataBR()');
        }
    }
}

// ------------------------------------------------------------------------

/**
 * converteDataUS
 *
 * converte uma data válida do formato BR
 * para o formato US
 *
 * @access    public
 * @param     string $data
 * @return    string $dataUS 
 */

if (! function_exists('converteDataUS'))
{
    function converteDataUS($data)
    {
        if(validaDataBR($data)){
            list($mes,$dia,$ano) = explode('/', $data);
            return $mes.'-'.$dia.'-'.$ano;
        }else{
            //log_message('error', 'Argumento inválido inserido para data, na função converteDataBR()');
        }
    }
}

// ------------------------------------------------------------------------

/**
 * validaDataUS
 *
 * Valida uma data no formato US
 *
 * @access    public
 * @param    string data
 * @return   boolean    
 */

if (! function_exists('validaDataUS'))
{
    function validaDataUS( $data )
    {
        list($a , $m , $d) = explode('-' , $data);
        return checkdate($m , $d , $a);
    }
}

// ------------------------------------------------------------------------

/**
 * validaDataBR
 *
 * Valida uma data no formato BR
 *
 * @access    public
 * @param    string data
 * @return   boolean    
 */

if (! function_exists('validaDataBR'))
{
    function validaDataBR( $data )
    {
        list($d , $m , $a) = explode('/' , $data);
        return checkdate($m , $d , $a);
    }
}

// ------------------------------------------------------------------------

/**
 * mesExtenso()
 *
 * Retorna a data inserida
 * em um formato extenso
 * Retorno no formato
 * dia de mes de ano
 * @access    public
 * @param    string data
 * @return    string data descritiva    
 */

if (! function_exists('mesExtenso'))
{
    function mesExtenso($data)
    {
        if(validaDataBR($data)){
            list($dia , $mes , $ano) = explode('/' , $data);
            $meses = array(
                1 => 'janeiro',
                2 => 'fevereiro',
                3 => 'março',
                4 => 'abril',
                5 => 'maio',
                6 => 'junho',
                7 => 'julho',
                8 => 'agosto',
                9 => 'setembro',
                10 => 'outubro',
                11 => 'novembro',
                12 => 'dezembro'
                );
            return $dia .' de '.$meses[$mes] .' de '.$ano;
        }
    }
}

// ------------------------------------------------------------------------

/**
 * diaSemanaExtenso
 *
 * Retorna o dia da semana por extenso
 * caso o dia não seja informado, a função
 * pegará o dia corrente
 *
 * @access    public
 * @param    string dia
 * @return   String dia extenso    
 */

if (! function_exists('diaSemanaExtenso'))
{
    function diaSemanaExtenso($dia = null)
    {
        $diaCorrente = date('w');
        $dia = is_null($dia) ? $diaCorrente : $dia;
        $dias = array(
            '0' => 'Domingo',
            '1' => 'Segunda-Feira',
            '2' => 'Terça-Feira',
            '3' => 'Quarta-Feira',
            '4' => 'Quinta-Feira',
            '5' => 'Sexta-Feira',
            '6' => 'Sábado'
            );
        return array_key_exists($dia, $dias) ? $dias[$dia] : $dias[$diaCorrente];
    }
}

// ------------------------------------------------------------------------

/**
 * verificaAnoBissexto
 *
 * Verifica se o ano informado é bissexto
 *
 * @access    public
 * @param     string ano
 * @return    booleano
 */

if (! function_exists('verificaAnoBissexto'))
{
    function verificaAnoBissexto($ano = null)
    {
        $ano = (is_null($ano)) ? date('Y') : $ano;
        return date("L", mktime(0, 0, 0, 1, 1, $ano));
    }
}

// ------------------------------------------------------------------------

/**
 * verificaDiaUtil
 *
 * verifica se uma determinada data é um dia útil 
 *
 * @access    public
 * @param     String data
 * @return    boolean
 */
 
if (! function_exists('verificaDiaUtil' ))
{
    function verificaDiaUtil ($data)
    {
        if(validaDataBR($data)){
            list($dia , $mes , $ano) = explode('/' , $data);
            $data = mktime(0, 0, 0, $mes, $dia, $ano);
            $diaSemana = date("w", $data);
            return ($diaSemana != 0) AND ($diaSemana != 6) ? true : false ;
        }
    }
}

// ------------------------------------------------------------------------

/**
 * diaAno
 *
 * Obtem o número do dia do ano (0 a 365)
 *
 * @access    public
 * @return    string dia  
 */
 
if (! function_exists('diaAno'))
{
    function diaAno()
    {
        return date('z');
    }
}

// ------------------------------------------------------------------------

/**
 * diaAno
 *
 * Obtem o número da semana de uma determinada data 
 *
 * @access    public
 * @return    string semana
 */
 
if (! function_exists('semanaAno'))
{
    function semanaAno()
    {
        return date('W');
    }
}

// ------------------------------------------------------------------------

/**
 * SubtraindoDiasDeUmaData 
 *
 * Subtrair dias de uma data 
 *
 * @access    public
 * @param    type    name
 * @return    type    
 */
 
if (! function_exists('SubtraindoDiasDeUmaData '))
{
    function SubtraindoDiasDeUmaData  ($dias)
    {
        echo "Hoje é: " . date("d/m/Y") . "<br>";
        $data_anterior = mktime(0, 0, 0, date("m"), 
        date("d") - $dias, date("Y"));
        echo $dias ." dias atrás foi: " . date("d/m/Y", $data_anterior);
    }
}
/* End of file data_helper.php */
/* Location: ./application/helper/data_helper.php */