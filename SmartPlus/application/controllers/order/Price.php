<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// [ 주문 - 주문 가격변경 ]
class Price extends CI_Controller  {
    function __construct() {
        parent::__construct();
        
        $this->load->model('order/order_m');
        $this->load->library('order/priceservice');
    }
    
    public function _remap($method) {
        if ( $method == 'list' ) {
            $method = 'orderlist';
        }        
        
        if( method_exists($this, $method) )
        {
            $this->{"{$method}"}();
        }else{
            $this->{"error"}();
        }
    }
    
    // 개별
    private function search() {
        $this->load->view('order/search');
    }
    
    // 일괄
    private function orderlist() {
        $this->load->view('order/list');
    }    
    
    // 엑셀
    private function excel() {
        $this->load->view('order/excel');
    }
    
    private function ajax() {
        $rtn['result'] = false;
        $param = $this->input->post(null, true);
        
        if ( $param['searchType'] == 'search' ) {
            $data = $this->order_m->getSearchOrder($param['searchText']);
            $price = $this->order_m->getChangePriceList($param['searchText']);
            
            if ( !empty($data) ) {
                $rtn['result'] = true;
                $rtn['data'] = $data;
                $rtn['price'] = $price;
            }
        } else if ( $param['searchType'] == 'list' ) {
            $data = $this->order_m->getSearchList($param['productCode'], $param['dayType'], $param['startDate'], $param['endDate']);
            $price = $this->order_m->getChangePriceSearchList($param['productCode'], $param['dayType'], $param['startDate'], $param['endDate']);
          
            if ( !empty($data) ) {
                $rtn['result'] = true;
                $rtn['data'] = $data;
                $rtn['price'] = $price;
            }
        } else if ( $param['searchType'] == 'searchSave' ) {
            // 개별 가격아이디 변경 저장
            
            $rtn['result'] = $this->priceservice->setPriceSearch($this->order_m, $param['targetIdx']);
            
            if ( !$rtn['result'] ) {
                $rtn['message'] = '가격업데이트에 실패했습니다.';
            }
        }
        
        echo json_encode($rtn, JSON_UNESCAPED_UNICODE);
    }
}
