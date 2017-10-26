<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Priceservice {
    
    // 개별 가격수정
    public function setPriceSearch($order_m, $data) {
        $procValid = true;
        $jsonArr = json_decode($data, true);
        
        if ( is_array($jsonArr) ) {
            foreach( $jsonArr as $v ) {
                // 판매가 업데이트
                if ( !empty($v['sellData']) ) {
                    $procValid = $this->setSellPriceData($order_m, $v['target'], $v['sellIdx'], (int) $v['sellData']);
                }
                
                // 원가 업데이트
                if ( !empty($v['wonData']) && $procValid ) {
                    $procValid = $this->setWonPriceData($order_m, $v['target'], $v['wonIdx'], (int) $v['wonData']);
                }
                
                if ( !$procValid ) {
                    break;
                }
            }
        } else {
            $procValid = false;
        }
        
        return $procValid;
    }
    
    // 판매가 업데이트
    private function setSellPriceData($order_m, $key, $curPriceKey, $changePriceKey) {
        return $order_m->setPriceData($key, array( 'p_price_id' => $changePriceKey ));
    }
    
    // 원가 업데이트
    private function setWonPriceData($order_m, $key, $curPriceKey, $changePriceKey) {
        return $order_m->setPriceData($key, array( 'price_id' => $changePriceKey, 'f_price_id' => $changePriceKey ));
    }    
}