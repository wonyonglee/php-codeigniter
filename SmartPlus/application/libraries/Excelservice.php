<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excelservice {
    // 단품 유효성 검사
    public function singleValidation($group_id, $data) {
        $map = Array();
        
        $map['code'] = '0000';
  
        $this->setSingleExcelRowData($map, $data[0], 'prd_name', 'V001', '상품 이름이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[1], 'prd_display_name', 'V002', '출력상품명이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[2], 'family_info', 'V003', '가족권 정보가 존재하지 않습니다');
        $this->setSingleExcelRowData($map, $data[3], 'week_info', 'V004', '주중/주말 정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[4], 'place_info', 'V005', '관광지 정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[5], 'channel', 'V006', '채널정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[6], 'sales_info', 'V007', '판매정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[7], 'valid_start', 'V008', '유효기간 시작정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[8], 'valid_end', 'V009', '유효기간 종료정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[9], 'adult_price', 'V010', '성인 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[10], 'youth_price', 'V011', '청소년 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[11], 'child_price', 'V012', '소인 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[12], 'baby_price', 'V013', '베이비 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[13], 'sms_yn', 'V014', 'SMS 사용여부가 존재하지 않습니다.');
        if ( $map['sms_yn'] == 'Y' ) $this->setSingleExcelRowData($map, $data[14], 'sms_content', 'V015', 'SMS 내용이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[15], 'lms_yn', 'V016', 'LMS 사용여부가 존재하지 않습니다.');
        if ( $map['lms_yn'] == 'Y' ) !$this->setSingleExcelRowData($map, $data[16], 'lms_subject', 'V017', 'LMS 제목이 존재하지 않습니다.');
        if ( $map['lms_yn'] == 'Y' ) !$this->setSingleExcelRowData($map, $data[17], 'lms_content', 'V018', 'LMS 내용이 존재하지 않습니다.');
        
        $map['sessionid'] = $group_id;
        
        return $map;
    }
    
    // 단품 관련 엑셀정보 등록
    public function singleParser($excel_m, $map) {
        return $excel_m->setExcelSingleProduct($map);
    }
    
    // 패키지 유효성 검사
    public function packageValidation($group_id, $data) {
        $map = Array();
    
        $map['code'] = '0000';
    
        $this->setSingleExcelRowData($map, $data[0], 'prd_name', 'V001', '상품 이름이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[1], 'prd_display_name', 'V002', '출력상품명이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[2], 'prd_detail_cd', 'V003', '패키지 상세코드 정보가 존재하지 않습니다');
        $this->setSingleExcelRowData($map, $data[3], 'channel', 'V006', '채널정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[4], 'sales_info', 'V007', '판매정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[5], 'valid_start', 'V008', '유효기간 시작정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[6], 'valid_end', 'V009', '유효기간 종료정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[7], 'adult_price', 'V010', '성인 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[8], 'youth_price', 'V011', '청소년 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[9], 'child_price', 'V012', '소인 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[10], 'baby_price', 'V013', '베이비 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[11], 'sms_yn', 'V014', 'SMS 사용여부가 존재하지 않습니다.');
        if ( $map['sms_yn'] == 'Y' ) $this->setSingleExcelRowData($map, $data[12], 'sms_content', 'V015', 'SMS 내용이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[13], 'lms_yn', 'V016', 'LMS 사용여부가 존재하지 않습니다.');
        if ( $map['lms_yn'] == 'Y' ) !$this->setSingleExcelRowData($map, $data[14], 'lms_subject', 'V017', 'LMS 제목이 존재하지 않습니다.');
        if ( $map['lms_yn'] == 'Y' ) !$this->setSingleExcelRowData($map, $data[15], 'lms_content', 'V018', 'LMS 내용이 존재하지 않습니다.');
    
        $map['sessionid'] = $group_id;
    
        return $map;
    }
    
    // 그룹등록 유효성 검사
    public function freeGroupValidation($group_id, $data) {
        $map = Array();
    
        $map['code'] = '0000';
    
        $this->setSingleExcelRowData($map, $data[0], 'group_name', 'V001', '상품 이름이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[1], 'group_code', 'V002', '출력상품명이 존재하지 않습니다.');
        
        $map['sessionid'] = $group_id;
    
        return $map;
    }    
    
    // 그룹등록 관련 엑셀정보 등록
    public function freeGroupParser($excel_m, $map) {
        return $excel_m->setExcelFreeGroup($map);
    }
    
    // 패키지 관련 엑셀정보 등록
    public function packageParser($excel_m, $map) {
        return $excel_m->setExcelPackageProduct($map);
    }
    
    // 자유이용권 유효성 검사
    public function freeValidation($group_id, $data) {
        $map = Array();
    
        $map['code'] = '0000';
    
        $this->setSingleExcelRowData($map, $data[0], 'prd_name', 'V001', '상품 이름이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[1], 'prd_display_name', 'V002', '출력상품명이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[2], 'group_info', 'V003', '자유이용권 그룹정보가 존재하지 않습니다');
        $this->setSingleExcelRowData($map, $data[3], 'channel', 'V004', '채널정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[4], 'group_detail_info', 'V005', '자유이용권 그룹 상세정보가 존재하지 않습니다');
        $this->setSingleExcelRowData($map, $data[5], 'sales_info', 'V006', '판매정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[6], 'valid_start', 'V007', '유효기간 시작정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[7], 'valid_end', 'V008', '유효기간 종료정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[8], 'adult_price', 'V009', '성인 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[9], 'youth_price', 'V010', '청소년 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[10], 'child_price', 'V011', '소인 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[11], 'baby_price', 'V012', '베이비 가격정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[12], 'sms_yn', 'V013', 'SMS 사용여부가 존재하지 않습니다.');
        if ( $map['sms_yn'] == 'Y' ) $this->setSingleExcelRowData($map, $data[13], 'sms_content', 'V014', 'SMS 내용이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[14], 'lms_yn', 'V015', 'LMS 사용여부가 존재하지 않습니다.');
        if ( $map['lms_yn'] == 'Y' ) !$this->setSingleExcelRowData($map, $data[15], 'lms_subject', 'V016', 'LMS 제목이 존재하지 않습니다.');
        if ( $map['lms_yn'] == 'Y' ) !$this->setSingleExcelRowData($map, $data[16], 'lms_content', 'V017', 'LMS 내용이 존재하지 않습니다.');
    
        $map['sessionid'] = $group_id;
    
        return $map;
    }
    
    // 자유이용권 관련 엑셀정보 등록
    public function freeParser($excel_m, $map) {
        return $excel_m->setExcelFreeProduct($map);
    }
    
    // 소셜등록 유효성 검사
    public function socialValidation($group_id, $data) {
        $map = Array();
    
        $map['code'] = '0000';
    
        $this->setSingleExcelRowData($map, $data[0], 'deal_name', 'V001', '딜명이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[1], 'channel', 'V002', '채널정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[2], 'deal_cd', 'V003', '딜 코드 정보가 존재하지 않습니다');
        $this->setSingleExcelRowData($map, $data[3], 'is_bind', 'V006', '묶음발송여부가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[4], 'sales_info', 'V007', '판매정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[5], 'valid_info', 'V008', '유효기간 시작정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[6], 'manager_name', 'V009', '담당자명이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[7], 'manager_hp', 'V010', '담당자 연락처가 존재하지 않습니다.');
        //$this->setSingleExcelRowData($map, $data[8], 'reserv_info', 'V011', ' 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[9], 'option_info', 'V012', '옵션정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[10], 'account', 'V013', '관리자코드 정보가 존재하지 않습니다.');
    
        $map['sessionid'] = $group_id;
    
        return $map;
    }
    
    // 자유이용권 관련 엑셀정보 등록
    public function socialParser($excel_m, $map) {
        return $excel_m->setExcelOptionInfo($map);
    }
    
    // 채널추가 유효성 검사
    public function chnlValidation($group_id, $data) {
        $map = Array();
    
        $map['code'] = '0000';
    
        $this->setSingleExcelRowData($map, $data[0], 'prd_cd', 'V001', '상품코드 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[1], 'prd_type', 'V002', '상품타입이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[2], 'chnl_info', 'V003', '채널정보가 존재하지 않습니다');
        $this->setSingleExcelRowData($map, $data[3], 'sales_info', 'V004', '판매기간정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[4], 'valid_start', 'V005', '유효기간정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[5], 'valid_end', 'V006', '유효기간정보 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[6], 'adult_price', 'V007', '성인가격이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[7], 'youth_price', 'V008', '청소년가격이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[8], 'child_price', 'V009', '어린이가격이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[9], 'baby_price', 'V010', '베이비가격이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[10], 'msg_channel', 'V011', '문자설정 대상 채널이 존재하지 않습니다.');
    
        $map['sessionid'] = $group_id;
    
        return $map;
    }
    
    // 채널추가 관련 엑셀정보 등록
    public function chnlParser($excel_m, $map) {
        return $excel_m->setExcelChnl($map);
    }
    
    // 가격변경 유효성 검사
    public function priceValidation($group_id, $data) {
        $map = Array();
    
        $map['code'] = '0000';

        $this->setSingleExcelRowData($map, $data[0], 'prd_cd', 'V001', '상품코드 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[1], 'channel', 'V002', '채널정보가 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[2], 'sales_info', 'V003', '판매기간 정보가 존재하지 않습니다');
        $this->setSingleExcelRowData($map, $data[3], 'adult_price', 'V004', '성인가격이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[4], 'youth_price', 'V005', '청소년가격이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[5], 'child_price', 'V006', '어린이가격이 존재하지 않습니다.');
        $this->setSingleExcelRowData($map, $data[6], 'baby_price', 'V007', '베이비가격이 존재하지 않습니다.');
    
        $map['sessionid'] = $group_id;
    
        return $map;
    }
    
    // 가격변경 관련 엑셀정보 등록
    public function priceParser($excel_m, $map) {
        return $excel_m->setExcelChangePrice($map);
    }
    
    private function setSingleExcelRowData(&$map, $data, $key, $code, $msg) {
        if ( isset($data) && !empty($data) ) {
            $map[$key] = $data;
        } else {
            if ( $map['code'] == '0000' ) {
                $map['code'] = $code;
                $map['message'] = $msg;
            }
        }
    }
    
    public function accountInfo($excel_m) {
        echo json_encode($excel_m->getAccountInfo());
    }
}