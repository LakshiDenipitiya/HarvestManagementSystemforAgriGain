<?php

class Manageorderstatus_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "buying_supplying_order";


    //supplier agreed status model

        function get_done_bo(){
        $this->db->where('buyingorder.status',1);
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

       function get_both_agreed_bo(){
         $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.buyerorder_boi_id');    
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.status',2);
            $this->db->group_by('buying_supplying_order.buyerorder_boi_id');
             if($this->session->userdata('designation_id')=="2"){
                $this->db->where('buyingorder.location_id',$this->session->userdata('location_id'));
            }
            $this->db->group_by('buyerorder_boi_id');
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

          function get_both_agreed_so(){
         $this->db->join('buying_supplying_order','supplyingorder.so_id=buying_supplying_order.supplierorder_soi_id');    
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.status',1);
            $this->db->group_by('buying_supplying_order.supplierorder_soi_id');
            if($this->session->userdata('designation_id')=="2"){
                $this->db->where('supplyingorder.location_id',$this->session->userdata('location_id'));
            }
            $this->db->group_by('supplierorder_soi_id');
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

        function get_so_advance_invoice_related_bo($soid){
           $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('buyingorderitem as b','a.buyerorder_boi_id=b.buyingorder_bo_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('buyer as d','a.buyer_id=d.id');
         $this->db->where('a.supplierorder_soi_id',$soid);
         $this->db->where('a.status',1);
         $this->db->where('a.bo_so_type',2);
         $this->db->group_by('b.item_i_id');
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
        }


     /*  function get_bo($boid){
        // $this->db->where('buyingorder.status',1);
         $this->db->where('buyingorder.bo_id',$boid);
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
       }*/

       function get_bo($boid){
         $this->db->select('*,buying_supplying_order.status as boso_stts');
     //    $this->db->where('buyingorder.status',1);
         $this->db->where('buyingorder.bo_id',$boid);
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');

            $this->db->join('location','buyingorder.location_id=location.id');
            $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.buyerorder_boi_id');
           // $this->db->join('vehicle','buying_supplying_order.vehicle_v_id=vehicle.v_id');
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
       }


        function get_bo_so_details($boid){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('supplyingorderitem as b','a.supplierorder_soi_id=b.supplyingorder_so_id');
         $this->db->join('supplyingorder', 'a.supplierorder_soi_id=supplyingorder.so_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('supplier as d','a.supplier_id=d.id');
         $this->db->where('a.buyerorder_boi_id',$boid);
         $this->db->where('a.status',2);
         $this->db->where('a.bo_so_type',1);
         $this->db->group_by('a.item_id');
         //$this->db->group_by('b.item_i_id');
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
      }

         function update_bo_so_order_status($bs_id,$updatearr){
            $this->db->where('bs_id',$bs_id);
            return $this->db->update('buying_supplying_order',$updatearr);
        }


         function update_so_bo_order_status($bs_id,$updatearr){
            $this->db->where('bs_id',$bs_id);
            return $this->db->update('buying_supplying_order',$updatearr);
        }


    //buyer agreed status model

         function get_done_so(){
        $this->db->where('supplyingorder.status',1);
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

      /*  function get_so($soid){
       //  $this->db->where('supplyingorder.status',1);
         $this->db->where('supplyingorder.so_id',$soid);
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
       }*/

        function get_so($soid){
         $this->db->select('*,buying_supplying_order.status as boso_stts');
     //    $this->db->where('supplyingorder.status',1);
         $this->db->where('supplyingorder.so_id',$soid);
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
              $this->db->join('buying_supplying_order','supplyingorder.so_id=buying_supplying_order.supplierorder_soi_id');
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
       }


        function get_so_bo_details($soid){
        $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('buyingorderitem as b','a.buyerorder_boi_id=b.buyingorder_bo_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('buyer as d','a.buyer_id=d.id');
         $this->db->where('a.supplierorder_soi_id',$soid);
         $this->db->where('a.status',1);
        $this->db->where('a.bo_so_type',2);
        $this->db->group_by('a.item_id');
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
      }

      //bo_so advance Paid
      function get_advpaid_bo(){
         $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.buyerorder_boi_id');    
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.status',3);
            $this->db->where('buying_supplying_order.bo_so_type',1);
            $this->db->group_by('buying_supplying_order.buyerorder_boi_id');
             if($this->session->userdata('designation_id')=="2"){
                $this->db->where('buyingorder.location_id',$this->session->userdata('location_id'));
            }
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

       function get_agriofficers($location){
           $this->db->where('designation_id',3);
           $this->db->where('location_id',$location);
           $query = $this->db->get('employee');
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return [];
            }
       }

        function get_vehicles($location){
           $this->db->where('location_id',$location);
           $query = $this->db->get('vehicle');
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return [];
            } 
       } 

       function check_date_valid($dt,$boid){
         $this->db->where('date_from <=',$dt);
         $this->db->where('date_to >=',$dt);
         $this->db->where('bo_id',$boid);
         $query = $this->db->get('buyingorder');
         if($query->num_rows()>0){
            return 1;
         }else{
            return 0;
         }
       }


       function save_assignedagriofficer($arr,$boid){
        $this->db->where('buyerorder_boi_id',$boid);
        return $this->db->update('buying_supplying_order',$arr);
       }

       //so_bo advance Paid
     function get_advpaid_so(){
         $this->db->join('buying_supplying_order','supplyingorder.so_id=buying_supplying_order.supplierorder_soi_id');    
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.status',3);
            $this->db->where('buying_supplying_order.bo_so_type',2);
            $this->db->group_by('buying_supplying_order.supplierorder_soi_id');
            if($this->session->userdata('designation_id')=="2"){
                $this->db->where('supplyingorder.location_id',$this->session->userdata('location_id'));
            }
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

       
       function get_so_agriofficers($location){
           $this->db->where('designation_id',3);
           $this->db->where('location_id',$location);
           $query = $this->db->get('employee');
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return [];
            }
       }

        function get_so_vehicles($location){
           $this->db->where('location_id',$location);
           $query = $this->db->get('vehicle');
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return [];
            } 
       } 

       function check_so_date_valid($dt,$boid){
         $this->db->where('date_from <=',$dt);
         $this->db->where('date_to >=',$dt);
         $this->db->where('so_id',$soid);
         $query = $this->db->get('supplyingorder');
         if($query->num_rows()>0){
            return 1;
         }else{
            return 0;
         }
       }


       function save_so_assignedagriofficer($arr,$soid){
        $this->db->where('supplierorder_soi_id',$soid);
        return $this->db->update('buying_supplying_order',$arr);
       }

       //ready to purchased_bo_so

       function get_readytopurchase_bo_so(){
        $this->db->select('*, employee.firstname as fname, employee.lastname as lname,buyer.firstname as bfname, buyer.lastname as blname');
           $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.buyerorder_boi_id');    
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
            $this->db->join('employee','buying_supplying_order.employee_id=employee.id');
            $this->db->where('buying_supplying_order.status',4);
            $this->db->where('buying_supplying_order.bo_so_type',1);
            if($this->session->userdata('designation_id')=="3"){
                $this->db->where('buying_supplying_order.employee_id',$this->session->userdata('employee_id'));
            }else if($this->session->userdata('designation_id')=="2"){
                $this->db->where('buyingorder.location_id',$this->session->userdata('location_id'));
            }

            $this->db->group_by('buying_supplying_order.buyerorder_boi_id');
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

       function get_bo_so_data($boso_id){
            $this->db->where('a.bs_id',$boso_id);
            $query = $this->db->get('buying_supplying_order as a');
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return [];
            }
       }

       function get_last_grnno(){
            $this->db->order_by('a.grn','DESC');
            $this->db->limit(1);
            $query = $this->db->get('buying_supplying_order as a');
            if($query->num_rows()>0){
                $prvgrnid = $query->row()->grn;
                $newgrnid = $prvgrnid+1;
                return $newgrnid;
            }else{
                return 1;
            }
       }

       function update_bo_so_orders_grn_tbl($updategrn,$bs_id){
         $this->db->where('bs_id',$bs_id);
         return $this->db->update('buying_supplying_order',$updategrn);
       }


       function get_bo_forgrn($boid){
        // $this->db->where('buyingorder.status',1);
         $this->db->where('buyingorder.bo_id',$boid);
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
       }


        function get_bo_so_details_forgrn($boid,$supplierorder_soi_id,$item_id){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('supplyingorderitem as b','a.supplierorder_soi_id=b.supplyingorder_so_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('supplier as d','a.supplier_id=d.id');
         $this->db->join('supplyingorder as e','b.supplyingorder_so_id=e.so_id');
         $this->db->where('a.buyerorder_boi_id',$boid);
         $this->db->where('b.supplyingorder_so_id',$supplierorder_soi_id);
         $this->db->where('b.item_i_id',$item_id);
         $this->db->where('a.bo_so_type',1);
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return [];
         }
      }

        function get_bo_related_so($boid){
            $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         //$this->db->join('supplyingorderitem as b','a.supplierorder_soi_id=b.supplyingorder_so_id');
         //$this->db->join('supplyingorder as f','b.supplyingorder_so_id=f.so_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('supplier as d','a.supplier_id=d.id');
         $this->db->where('a.buyerorder_boi_id',$boid);

         $this->db->where('a.status',4);
         $this->db->where('a.bo_so_type',1);
         //$this->db->group_by('b.item_i_id');
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
        } 

        // bo_so_order complete
         function get_readytodistpatch_bo_so(){
           $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.buyerorder_boi_id');    
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.status',5);
            $this->db->where('buying_supplying_order.bo_so_type',1);
            if($this->session->userdata('designation_id')=="3"){
                $this->db->where('buying_supplying_order.employee_id',$this->session->userdata('employee_id'));
            }else if($this->session->userdata('designation_id')=="2"){
                $this->db->where('buyingorder.location_id',$this->session->userdata('location_id'));
            }

            $this->db->group_by('buying_supplying_order.buyerorder_boi_id');
        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

        function get_bo_so_details_readytodistpatch($boid){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('supplyingorderitem as b','a.supplierorder_soi_id=b.supplyingorder_so_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('supplier as d','a.supplier_id=d.id');
         $this->db->where('a.buyerorder_boi_id',$boid);
         $this->db->where('a.status',5);
         $this->db->where('a.bo_so_type',1);
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
      }

      // full view bo_so
        function get_all_bo_so(){
            $this->db->select('*, buying_supplying_order.status as bs_stts');
           $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.buyerorder_boi_id');    
         $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
            $this->db->join('location','buyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.bo_so_type',1);
            
            $this->db->group_by('buying_supplying_order.buyerorder_boi_id');
              if($this->session->userdata('designation_id')=="2"){
                $this->db->where('buyingorder.location_id',$this->session->userdata('location_id'));
            }else if($this->session->userdata('designation_id')=="3"){
               $this->db->where('buying_supplying_order.employee_id',$this->session->userdata('employee_id'));
            }


        $query = $this->db->get('buyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }

        function get_full_bo_so_details($boid){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('supplyingorderitem as b','a.supplierorder_soi_id=b.supplyingorder_so_id');
         $this->db->join('supplyingorder', 'a.supplierorder_soi_id=supplyingorder.so_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('supplier as d','a.supplier_id=d.id');
         $this->db->where('a.buyerorder_boi_id',$boid);
         $this->db->where('a.bo_so_type',1);
         $this->db->group_by('b.item_i_id');
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
      }


      // ready to purchased so_bo
          function get_readytopurchase_so_bo(){
           $this->db->select('*, employee.firstname as fname, employee.lastname as lname,supplier.firstname as bfname, supplier.lastname as blname');
           $this->db->from('buyingorder');

           $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.  buyerorder_boi_id');   
           $this->db->join('supplyingorder','buying_supplying_order.supplierorder_soi_id=supplyingorder.so_id');  
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
          $this->db->join('employee','buying_supplying_order.employee_id=employee.id');
            $this->db->join('location','buyingorder.location_id=location.id');
            $this->db->join('item','buying_supplying_order.item_id=item.i_id');
            $this->db->where('buying_supplying_order.status',4);
            $this->db->where('buying_supplying_order.bo_so_type',2);
            if($this->session->userdata('designation_id')=="3"){
                $this->db->where('buying_supplying_order.employee_id',$this->session->userdata('employee_id'));
            }else if($this->session->userdata('designation_id')=="2"){
                $this->db->where('supplyingorder.location_id',$this->session->userdata('location_id'));
            }

            $this->db->group_by('buying_supplying_order.supplierorder_soi_id');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }



        function get_so_related_bo($soid){
            $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
        // $this->db->join('buyingorderitem as b','a.buyerorder_boi_id=b.buyingorder_bo_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('buyer as d','a.buyer_id=d.id');
         $this->db->where('a.supplierorder_soi_id',$soid);
         $this->db->where('a.status',4);
         $this->db->where('a.bo_so_type',2);
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
        }

        function get_so_bo_data($sobo_id){
              $this->db->where('a.bs_id',$sobo_id);
            $query = $this->db->get('buying_supplying_order as a');
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return [];
            }
        }

         function get_so_forgrn($soid){
         //$this->db->where('supplyingorder.status',1);
         $this->db->where('supplyingorder.so_id',$soid);
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
       }

        function get_so_bo_details_forgrn($soid,$buyerorder_boi_id,$item_id){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('buyingorderitem as b','a.buyerorder_boi_id=b.buyingorder_bo_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('buyer as d','a.buyer_id=d.id');
         $this->db->join('buyingorder as e','b.buyingorder_bo_id=e.bo_id');
         $this->db->where('a.supplierorder_soi_id',$soid);
         $this->db->where('b.buyingorder_bo_id',$buyerorder_boi_id);
         $this->db->where('b.item_i_id',$item_id);
         $this->db->where('a.bo_so_type',2);
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return [];
         }
      }

         function get_so_bo_details_readytodistpatch($soid){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('buyingorderitem as b','a.buyerorder_boi_id=b.buyingorder_bo_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('supplier as d','a.supplier_id=d.id');
         $this->db->where('a.supplierorder_soi_id',$soid);
         $this->db->where('a.status',5);
         $this->db->where('a.bo_so_type',2);
         if($this->session->userdata('designation_id')=="3"){
                $this->db->where('buying_supplying_order.employee_id',$this->session->userdata('employee_id'));
            }else if($this->session->userdata('designation_id')=="2"){
                $this->db->where('buyingorder.location_id',$this->session->userdata('location_id'));
            }
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
      }

    

      function get_readytodistpatch_so_bo(){
           $this->db->join('buying_supplying_order','supplyingorder.so_id=buying_supplying_order.supplierorder_soi_id');    
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.status',5);
            $this->db->where('buying_supplying_order.bo_so_type',2);
            if($this->session->userdata('designation_id')=="3"){
                $this->db->where('buying_supplying_order.employee_id',$this->session->userdata('employee_id'));
            }else if($this->session->userdata('designation_id')=="2"){
                $this->db->where('supplyingorder.location_id',$this->session->userdata('location_id'));
            }

            $this->db->group_by('buying_supplying_order.supplierorder_soi_id');
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }



      function get_so_duepayment_invoice_related_bo($soid){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('buyingorder as e','a.buyerorder_boi_id=e.bo_id');
         $this->db->join('item as f','a.item_id=f.i_id');
         $this->db->join('location as c','e.location_id=c.id');
         $this->db->join('buyer as d','a.buyer_id=d.id');
         $this->db->where('a.status',5);
         $this->db->where('a.bo_so_type',2);
         $this->db->where('a.supplierorder_soi_id',$soid);
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
      }

        function get_full_so_bo_details($soid){
         $this->db->select('*');
         $this->db->from('buying_supplying_order as a');
         $this->db->join('buyingorderitem as b','a.buyerorder_boi_id=b.buyingorder_bo_id');
       //  $this->db->join('buyingorder','a.buyerorder_boi_id=buyingorder.bo_id');
       //  $this->db->join('vehicle as e','a.vehicle_v_id=e.v_id');
         $this->db->join('item as c','a.item_id=c.i_id');
         $this->db->join('buyer as d','a.buyer_id=d.id');
        
         $this->db->where('a.supplierorder_soi_id',$soid);
         $this->db->where('a.bo_so_type',2);
         $this->db->group_by('b.item_i_id');
         $query = $this->db->get();
         if($query->num_rows()>0){
            return $query->result();
         }else{
            return [];
         }
      }


       function get_all_so_bo(){
            $this->db->select('*, buying_supplying_order.status as bs_stts');
           $this->db->join('buying_supplying_order','supplyingorder.so_id=buying_supplying_order.supplierorder_soi_id');    
         $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
            $this->db->join('location','supplyingorder.location_id=location.id');
            $this->db->where('buying_supplying_order.bo_so_type',2);
            
            $this->db->group_by('buying_supplying_order.supplierorder_soi_id');
              if($this->session->userdata('designation_id')=="2"){
                $this->db->where('supplyingorder.location_id',$this->session->userdata('location_id'));
            }else if($this->session->userdata('designation_id')=="3"){
               $this->db->where('buying_supplying_order.employee_id',$this->session->userdata('employee_id'));
            }
        $query = $this->db->get('supplyingorder');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
       }


   }
?>