<?php
//error_reporting(0);
/*
 * Script:    DataTables PDO server-side script for PHP and MySQL
 * CopyLeft: March 2016 - wildantea, wildantea.com
 * Email : wildannudin@gmail.com
 */
class DTable extends Database
{
    private $total_filtered;
    private $record_total;
    public $offset;
    public $data = array();
    public $request;
    public $search_request;
    public $is_numbering = 0;
    public $primary_key;
    public $order_by;
    public $order_type;

    

    
    //filter data
    public function get_column($col)
    {
        foreach ($col as $key) {
            $keys   = $key . " LIKE ?";
            $mark[] = $keys;
        }
        
        $im = implode(' OR  ', $mark);
        return $im;
    }
    
    public function get_value($col, $value)
    {
        foreach ($col as $key) {
            $val      = '%' . $value . '%';
            $result[] = $val;
        }
        
        return $result;
    }


    public function result_data($sql,$prepare_data=null)
    {
        $result = $this->custom_query($sql,$prepare_data);
        
        return $result;

    }

    public function set_total_record($sql,$prepare_data=null)
    {
        $result = $this->custom_query($sql,$prepare_data);
        
        //total filtered default
        $this->record_total = $result->rowCount();
    }


    public function set_total_filtered($sql,$prepare_data=null)
    {
        $result = $this->custom_query($sql,$prepare_data);
        
        //total filtered default
        $this->total_filtered = $result->rowCount();

    }


    public function join_value($search_value,$where_data=null)
    {
        
        if ($where_data!=null) {
            $where_data = array_values($where_data);
        } else {
            $where_data = array();
        }
        $res = array_merge($search_value,$where_data);
        return $res;
    }


    //create numbering column
    public function number($number)
    {
        $requestData   = $_REQUEST['start']+$number;
        return $requestData;

    }

    public function set_numbering_status($status) {
         $this->is_numbering = $status;
    }



    public function set_order_by($val)
    {
        $this->order_by = $val;
    } 


    public function set_order_type($val)
    {
        $this->order_type = $val;
    }

    
    //custom query datatable
    public function get_custom($sql, $columns,$prepare_data=null)
    {

        if ($prepare_data!==null) {
        $prepare_data=array_values($prepare_data);
        }




        //all data request
        $requestData   = $_REQUEST;
        $this->request = $requestData;
        
       
             $offset       = $requestData['start'];
             $offsets      = $offset ? $offset : 0;
             $this->offset = $offsets;

             
             //if order by is defined
             if ($this->order_by) {
                 
                   if ($requestData['draw']==1) {

                 $do_order = $this->order_by;
                 $do_order_type = $this->order_type;
                 } elseif ($requestData['start']>0) {

                     $do_order = $this->order_by;
                     $do_order_type = $this->order_type;
                 } elseif ($requestData['start']==0 && $requestData['order'][0]['column']==0) {
                    $do_order = $this->order_by;
                     $do_order_type = $this->order_type;
                 }
                    else {
                if ($this->is_numbering==true && $requestData['order'][0]['column']!=0) {
                    $do_order = $columns[$requestData['order'][0]['column']-1];
                    $do_order_type = $requestData['order'][0]['dir'];
                } else {
                    $do_order = $columns[$requestData['order'][0]['column']];
                    $do_order_type = $requestData['order'][0]['dir'];
                }
                
                }

             } 
             else {
                if ($this->is_numbering==true && $requestData['order'][0]['column']!=0) {
                    $do_order = $columns[$requestData['order'][0]['column']-1];
                    $do_order_type = $requestData['order'][0]['dir'];
                } else {
                    $do_order = $columns[$requestData['order'][0]['column']];
                    $do_order_type = $requestData['order'][0]['dir'];
                }
                
             }

           
            
//echo $do_order;        
        if (!empty($requestData['search']['value'])) {




            $this->search_request  = $requestData['search']['value'];
            
            if (strpos($sql, 'where') !== false || strpos($sql, 'WHERE') !== false) {
                $condition = "and";
            } else {
                $condition = "where";
            }
            
              //get search value
            $search_value = $this->get_value($columns, $this->search_request);

            //join search with where data and extract where data value
            $join = $this->join_value($search_value,$prepare_data);


            $sql = $sql;
            $sql .= " $condition " . $this->get_column($columns);

            //set total filtered
            $this->set_total_filtered($sql,$join);
            
            $sql .= " ORDER BY " . $do_order . "   " . $do_order_type . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";

            $result = $this->result_data($sql,$join);

        } else {

            $this->set_total_record($sql,$prepare_data);

            $this->set_total_filtered($sql,$prepare_data);

         /*   if ($orderBy!=$this->order_by && $orderByType!=$this->order_type) {
                
            }*/
            
            $sql = $sql;
            $sql .= " ORDER BY " . $do_order . "   " . $do_order_type . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";

            $result = $this->result_data($sql,$prepare_data);

        }
        
        //$data = $this->table_data($result,$columns);
        //
        return $result;
    }
    
    public function get_offset()
    {
        return $this->offset;
    }
    
    public function create_data()
    {
        $data      = $this->data;
        $json_data = array(
            "draw" => intval($this->request['draw']),
            "recordsTotal" => intval($this->record_total),
            "recordsFiltered" => intval($this->total_filtered),
            "data" => $data // total data array
        );
        echo json_encode($json_data);
        // send data as json format
    }
    
    public function set_data($data)
    {
        $this->data = $data;
    }
    
}

?>