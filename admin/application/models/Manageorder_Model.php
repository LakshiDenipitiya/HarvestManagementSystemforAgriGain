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
        if($this->session->userdata('designation_id')=="2"){
                $this->db->where('buyingorder.location_id',$this->session->userdata('location_id'));
            }
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
         if($this->session->userdata('designation_id')=="2"){
                $this->db->where('supplyingorder.location_id',$this->session->userdata('location_id'));
            }
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




        function getavailableSupplyingOrders_data($mainarray2,$location,$dtfrm,$dtto){
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
      //$dtfrmwhr = "(buyingorder.date_from BETWEEN '".$dtfrm."' AND '".$dtto."')";
      //$dttowhr = "(buyingorder.date_to BETWEEN '".$dtfrm."' AND '".$dtto."')";

      $dtfrmwhr = "(supplyingorder.date_from BETWEEN '".$dtfrm."' AND '".$dtto."') AND (supplyingorder.date_to BETWEEN '".$dtfrm."' AND '".$dtto."')";

      $this->db->where($dtfrmwhr);
      //$this->db->or_where($dttowhr);
    
      if($mainarray2){
         $whr = 'supplyingorderitem.item_i_id IN ('.$mainarray2.')';
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

  
   function add_so_bo_order($insertso_boarray){
    return $this->db->insert('buying_supplying_order',$insertso_boarray);
   }


    function getavailableBuyingOrders_data($mainarray2,$location,$dtfrm,$dtto){
       //echo $mainarr;
       //$ar = "19,4";
       $this->db->select('*');
      $this->db->from('buyingorder');
      $this->db->join('buyingorderitem','buyingorder.bo_id=buyingorderitem.buyingorder_bo_id');
      $this->db->join('location','buyingorder.location_id=location.id');
      $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
      $this->db->join('item','buyingorderitem.item_i_id=item.i_id');

     $this->db->where('buyingorderitem.boi_status',0);
      $this->db->where('buyingorder.location_id',$location);
      //$dtfrmwhr = "(buyingorder.date_from BETWEEN '".$dtfrm."' AND '".$dtto."')";
      //$dttowhr = "(buyingorder.date_to BETWEEN '".$dtfrm."' AND '".$dtto."')";

      $dtfrmwhr = "(buyingorder.date_from BETWEEN '".$dtfrm."' AND '".$dtto."') AND (buyingorder.date_to BETWEEN '".$dtfrm."' AND '".$dtto."')";

      $this->db->where($dtfrmwhr);
      //$this->db->or_where($dttowhr);

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

                  




    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }




}
?>