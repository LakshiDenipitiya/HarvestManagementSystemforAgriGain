<?php

class Manageorder_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "buying_supplying_order";



    function getAllBuyingOrders(){
        $this->db->select('*');  
        $this->db->from('buyingorder');
        $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
        $this->db->join('location','buyingorder.location_id=location.id');
        $this->db->where('buyingorder.status',0);
        $this->db->where('buyingorder.buyer_id',$this->session->userdata('employee_id'));
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    
      function getAllSupplyingOrders(){
        $this->db->select('*');
        $this->db->from('supplyingorder');
        $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
        $this->db->join('location','supplyingorder.location_id=location.id');
        $this->db->where('supplyingorder.status',0);
        $this->db->where('supplyingorder.supplier_id',$this->session->userdata('employee_id'));
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }




    function getAllBuyingOrders_data($boid){
         $this->db->select('*');
        $this->db->from('buyingorder');
        $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
        $this->db->join('location','buyingorder.location_id=location.id');
        $this->db->where('buyingorder.bo_id',$boid);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
    }

     function getAllSupplyingOrders_data($soid){
        $this->db->select('*');
        $this->db->from('supplyingorder');
        $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
        $this->db->join('location','supplyingorder.location_id=location.id');
        $this->db->where('supplyingorder.so_id',$soid);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
    }


    function getAllBuyingOrders_dataitem($boid){
        $this->db->select('*');
        $this->db->from('buyingorderitem');
        $this->db->join('item','buyingorderitem.item_i_id=item.i_id');
        $this->db->where('buyingorderitem.buyingorder_bo_id',$boid);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

     function getAllSupplyingOrders_dataitem($soid){
        $this->db->select('*');
        $this->db->from('supplyingorderitem');
        $this->db->join('item','supplyingorderitem.item_i_id=item.i_id');
        $this->db->where('supplyingorderitem.supplyingorder_so_id',$soid);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

     function getAllSupplyingOrders_dataitem_so($soid){
        $this->db->select('*');
        $this->db->from('supplyingorderitem');
        $this->db->join('item','supplyingorderitem.item_i_id=item.i_id');
        $this->db->where('supplyingorderitem.supplyingorder_so_id',$soid);
         $this->db->where('supplyingorderitem.so_balance_qty >',0);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }
/*    function getavailableSupplyingOrders_data($id){
      $this->db->select('*');
      $this->db->from('supplyingorder');
      $this->db->join('supplyingorderitem','supplyingorder.so_id=supplyingorderitem.supplyingorder_so_id');
      $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
        $this->db->join('item','supplyingorderitem.item_i_id=item.i_id');
      $this->db->where('supplyingorderitem.item_i_id',$id);
      $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }*/

    function getavailableSupplyingOrders_data($mainarray,$location,$dtfrm,$dtto){
       //echo $mainarr;
       //$ar = "19,4";
       $this->db->select('*');
      $this->db->from('supplyingorder');
      $this->db->join('supplyingorderitem','supplyingorder.so_id=supplyingorderitem.supplyingorder_so_id');
       $this->db->join('location','supplyingorder.location_id=location.id');
      $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
        $this->db->join('item','supplyingorderitem.item_i_id=item.i_id');
        
      $this->db->where('supplyingorderitem.soi_status',0);
      $this->db->where('supplyingorder.location_id',$location);
     // $dtfrmwhr = "supplyingorder.date_from BETWEEN '".$dtfrm."' AND '".$dtto."'";
    //  $dttowhr = "supplyingorder.date_to BETWEEN '".$dtfrm."' AND '".$dtto."'";

        $dtfrmwhr = "(supplyingorder.date_from BETWEEN '".$dtfrm."' AND '".$dtto."') AND (supplyingorder.date_to BETWEEN '".$dtfrm."' AND '".$dtto."')";


      $this->db->where($dtfrmwhr);
      


      //$this->db->where('supplyingorder.date_from <',$dtfrm);
      //$this->db->where('supplyingorder.date_to >',$dtto);

      if($mainarray){
            $whr = 'supplyingorderitem.item_i_id IN ('.$mainarray.')';
            $this->db->where($whr); 
      }
       
      $this->db->where('supplyingorderitem.so_balance_qty>',0);


      //return $this->db->last_query();
      $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }   
    }


    function getboitemqty($boid,$itemid){
        $this->db->where('buyingorderitem.buyingorder_bo_id',$boid);
        $this->db->where('buyingorderitem.item_i_id',$itemid);
        $query = $this->db->get('buyingorderitem');
        return $query->row()->bo_balance_qty;
    }

      function getsoitemqty($soid,$itemid){
        $this->db->where('supplyingorderitem.supplyingorder_so_id',$soid);
        $this->db->where('supplyingorderitem.item_i_id',$itemid);
        $query = $this->db->get('supplyingorderitem');
        return $query->row()->so_balance_qty;
    }

    function getboitem_rows_count($boid){
        $this->db->where('buyingorderitem.buyingorder_bo_id',$boid);
        $query = $this->db->get('buyingorderitem');
        return $query->num_rows();

    }

      function getsoitem_rows_count($soid){
        $this->db->where('supplyingorderitem.supplyingorder_so_id',$soid);
        $query = $this->db->get('supplyingorderitem');
        return $query->num_rows();

    }

   function check_bo_complete($boid,$boitemrowcount){
        $this->db->where('buyingorderitem.buyingorder_bo_id',$boid);
        $this->db->where('buyingorderitem.boi_status',1);
        $query = $this->db->get('buyingorderitem');
        if($query->num_rows()==$boitemrowcount){
          $updarr['status'] = 1;
          $this->db->where('bo_id',$boid);
          $this->db->update('buyingorder',$updarr);
        }else{
          
             
        }
   }


                     /*  function get_done_bo(){
                        $this->db->where('buyingorder.status',1);
                         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
                            $this->db->join('location','buyingorder.location_id=location.id');
                        $query = $this->db->get('buyingorder');
                        if($query->num_rows()>0){
                            return $query->result();
                        }else{
                            return [];
                        }
                       }  */


                /*         function get_done_so(){
                        $this->db->where('supplyingorder.status',1);
                         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
                            $this->db->join('location','supplyingorder.location_id=location.id');
                        $query = $this->db->get('supplyingorder');
                        if($query->num_rows()>0){
                            return $query->result();
                        }else{
                            return [];
                        }
                       } */



                         /*  function get_bo($boid){
                             $this->db->where('buyingorder.status',1);
                             $this->db->where('buyingorder.bo_id',$boid);
                             $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
                                $this->db->join('location','buyingorder.location_id=location.id');
                            $query = $this->db->get('buyingorder');
                            if($query->num_rows()>0){
                                return $query->row();
                            }else{
                                return [];
                            }
                           } */

              /*        function get_so($soid){
                     $this->db->where('supplyingorder.status',1);
                     $this->db->where('supplyingorder.so_id',$soid);
                     $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
                        $this->db->join('location','supplyingorder.location_id=location.id');
                    $query = $this->db->get('supplyingorder');
                    if($query->num_rows()>0){
                        return $query->row();
                    }else{
                        return [];
                    }
                   } */



                    /*   function get_bo_so_details($boid){
                         $this->db->select('*');
                         $this->db->from('buying_supplying_order as a');
                         $this->db->join('supplyingorderitem as b','a.supplierorder_soi_id=b.supplyingorder_so_id');
                         $this->db->join('item as c','a.item_id=c.i_id');
                         $this->db->join('supplier as d','a.supplier_id=d.id');
                         $this->db->where('a.buyerorder_boi_id',$boid);
                         $this->db->where('a.status',2);
                         $this->db->where('a.bo_so_type',1);
                         $query = $this->db->get();
                         if($query->num_rows()>0){
                            return $query->result();
                         }else{
                            return [];
                         }
                      } */


               /*        function get_so_bo_details($soid){
                         $this->db->select('*');
                         $this->db->from('buying_supplying_order as a');
                         $this->db->join('buyingorderitem as b','a.buyerorder_boi_id=b.buyingorder_bo_id');
                         $this->db->join('item as c','a.item_id=c.i_id');
                         $this->db->join('buyer as d','a.buying_id=d.id');
                         $this->db->where('a.supplierorder_soi_id',$soid);
                         $this->db->where('a.status',1);
                        $this->db->where('a.bo_so_type',2);
                         $query = $this->db->get();
                         if($query->num_rows()>0){
                            return $query->result();
                         }else{
                            return [];
                         }
                      }*/





    function check_so_complete($soid,$soitemrowcount){
        $this->db->where('supplyingorderitem.supplyingorder_so_id',$soid);
        $this->db->where('supplyingorderitem.soi_status',1);
        $query = $this->db->get('supplyingorderitem');
        if($query->num_rows()==$soitemrowcount){
          $updarr['status'] = 1;
          $this->db->where('so_id',$soid);
          $this->db->update('supplyingorder',$updarr);
        }else{
               
        }
   }

   function add_bo_so_order($insertbo_soarray){
    return $this->db->insert('buying_supplying_order',$insertbo_soarray);
   }

   function add_so_bo_order($insertbo_soarray){
    return $this->db->insert('buying_supplying_order',$insertbo_soarray);
   }


    function getavailableBuyingOrders_data($mainarray2,$location,$dtfrm,$dtto){
       //echo $mainarr;
       //$ar = "19,4";
       $this->db->select('*');
      $this->db->from('buyingorder');
      $this->db->join('buyingorderitem','buyingorder.bo_id=buyingorderitem.buyingorder_bo_id');
      $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
      $this->db->join('item','buyingorderitem.item_i_id=item.i_id');
      $this->db->join('location','buyingorder.location_id=location.id');

     $this->db->where('buyingorderitem.boi_status',0);
      $this->db->where('buyingorder.location_id',$location);
      
       $dtfrmwhr = "(buyingorder.date_from BETWEEN '".$dtfrm."' AND '".$dtto."') AND (buyingorder.date_to BETWEEN '".$dtfrm."' AND '".$dtto."')";

      $this->db->where($dtfrmwhr);
     
   /*   if($mainarray2){
        $whr = 'buyingorderitem.item_i_id IN ('.$mainarray2.')';
        $this->db->where($whr); 
      }*/
      if($mainarray2){
           $whr = 'buyingorderitem.item_i_id IN ('.$mainarray2.')';
            $this->db->where($whr); 
      }
 
      $this->db->where('buyingorderitem.bo_balance_qty>',0);

      
      //return $this->db->last_query();
      $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }   
    }

  

     function update_boitemtbl($updateboitmearr,$boid,$itemid){
        $this->db->where('buyingorder_bo_id',$boid);
        $this->db->where('item_i_id',$itemid);
        return $this->db->update('buyingorderitem',$updateboitmearr);
    }

    function update_soitemtbl($updatesoitmearr,$soid,$itemid){
         $this->db->where('supplyingorder_so_id',$soid);
        $this->db->where('item_i_id',$itemid);
        return $this->db->update('supplyingorderitem',$updatesoitmearr);
    }

                  /*      function update_bo_so_order_status($bs_id,$updatearr){
                            $this->db->where('bs_id',$bs_id);
                            return $this->db->update('buying_supplying_order',$updatearr);
                        }*/




public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }



/*
    // Get all locations
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create locations
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

   // public function checklocation($location){
   //      $this->db->select();
   //      $this->db->from($this->table);
   //      $this->db->where('location', $location);
   //      $this->db->limit(1);

   //      $qu = $this->db->get();

   //      if($qu->num_rows() == 1){
   //          return $qu->row();
   //      }
   //      return false;
   //  }
        // Get locations by id 
    





    function get_by_id($id)
    {
        $this->db->where("id",$id);

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 


        // Update locations
    function update_by_id($id, $data)
    {
        try {
            $this->db->where("id",$id);
            $this->db->update($this->table,$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete locations
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }*/
}
?>