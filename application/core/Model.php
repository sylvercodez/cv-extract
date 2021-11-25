<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		log_message('info', 'Model Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}
    
    public function filter($request, $columns){
    	$globalSearch = array();
    	$columnSearch = array();
    	$dtColumns = $this->pluck( $columns, 'column' );
    	if ( isset($request['search']) && $request['search']['value'] != '' ) {
    		$str = $request['search']['value'];
            $str = trim($str,'^');
            $str = trim($str,'$');
            $str = trim($str);
            
    		for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
    			$requestColumn = $request['columns'][$i];
                
    			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
                $column = $columns[ $columnIdx ];
    			if ( isset($column['column']) && $requestColumn['searchable'] == 'true' ) {
    				$globalSearch[] = "`".$column['prefix']."`.`".$column['column']."` LIKE '%".$str."%'";
    			}
    		}
    	}
        
    	// Individual column filtering
    	if ( isset( $request['columns'] ) ) {
    		for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
    			$requestColumn = $request['columns'][$i];
    			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
    			$column = $columns[ $columnIdx ];
                //echo '<pre>';print_R($column);
                if(isset($column['column'])){
                    
        			$str = $requestColumn['search']['value'];
                    $str = trim($str,'^');
                    $str = trim($str,'$');
                    $str = trim($str);
                    //$requestColumn['searchable'] == 'true' && 
        			if ( $str != '' ){
                        $col = isset($column['filter_column'])?$column['filter_column']:$column['column'];
                        if($str=='0'&&isset($column['child_column'])){
                            $col = $column['child_column'];
                            $column['prefix'] = $column['child_prefix'];
                        }
        				$columnSearch[] = "`".$column['prefix']."`.`".$col."` = '".$str."'";
        			}
                }
    		}
    	}
    	// Combine the filters into a single string
    	$where = '';
    	if ( count( $globalSearch ) ) {
    		$where = '('.implode(' OR ', $globalSearch).')';
    	}
    	if ( count( $columnSearch ) ) {
    		$where = $where === '' ? implode(' AND ', $columnSearch) : $where .' AND '. implode(' AND ', $columnSearch);
    	}
        return $where;
    }
    
    public function pluck ( $a, $prop ){
    	$out = array();
    	for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
    	  if(isset($a[$i][$prop])){
    		$out[] = $i;
            }
    	}
    	return $out;
    }
    
    public function order ( $request, $columns, $array=false){
    	$order = '';
        $orderarray = array();
    	if ( isset($request['order']) && count($request['order']) ) {
    		$orderBy = array();
    		$dtColumns = $this->pluck( $columns, 'column' );
    		for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
    			// Convert the column index into the column data property
    			$columnIdx = intval($request['order'][$i]['column']);
    			$requestColumn = $request['columns'][$columnIdx];
    			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
    			$column = $columns[ $columnIdx ];
    			if ( $requestColumn['orderable'] == 'true' ) {
    				$dir = $request['order'][$i]['dir'] === 'asc' ?
    					'ASC' :
    					'DESC';
                    
    				$orderBy[] = ' `'.$column['column'].'` '.$dir;
                    array_push($orderarray,array('column'=>$column['prefix'].'.'.$column['column'],'order'=>$dir));
    			}
    		}
    		$order = ' '.implode(', ', $orderBy);
    	}
        if($array===false){
    	  return $order;
        }
        else{
            return $orderarray;
        }
    }

}
