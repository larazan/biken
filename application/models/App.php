<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class App extends CI_Model
{

    private static $db;

    function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    // get all user data
    static function getCustomer($user_id) {
        if (is_numeric($user_id)) {
            $c = self::$db->where('customer_id', $user_id)->get('tbl_customer');
            if ($c->num_rows() > 0) { 
                return $c->row(); 
            } else { 
                return FALSE; 
            }
        }
    }

    // Get all shipping data
    static function getShipping($shipping_id) {
        if (is_numeric($shipping_id)) {
            $c = self::$db->where('shipping_id', $shipping_id)->get('tbl_shipping');
            if ($c->num_rows() > 0) { 
                return $c->row(); 
            } else { 
                return FALSE; 
            }
        }
    }

    // Get shipping price
    static function shippingPrice($shipping_id) {
        $zero = 0;
        $c = self::$db->where('shipping_id', $shipping_id)->get('tbl_shipping')->row()->courrier;
		if ($c != '') {
            $arr = explode(",",$c); 
            return $arr[2]; 
        } else { 
            return $zero; 
        }
    } 

    // Get no order
    static function getNoOrder($session_id) {
        $c = self::$db->where('session_id', $session_id)->get('tbl_order')->row();
		if ($c != '') {
            return $c->no_order; 
        } else { 
            return '-'; 
        }
    }
    
}
