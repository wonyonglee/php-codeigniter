<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller  {
    function __construct() {
        parent::__construct();
        $this->load->model('excel_m');
        $this->load->library('excelservice');
        $this->load->library('PHPExcel');
    }
    
    public function _remap($method) {
        if( method_exists($this, $method) )
        {
            $this->{"{$method}"}();
        }else{
            $this->{"error"}();
        }
    }
    
    // 단품
    private function index() {
        $this->load->view('product/excel/single');
    }
    
    // 패키지
    private function package() {
        $this->load->view('product/excel/package');
    }
    
    // 자유이용권
    private function free() {
        $this->load->view('product/excel/free');
    }
    
    // 채널추가
    private function chnl() {
        $this->load->view('product/excel/chnl');
    }
    
    // 자유이용권 그룹추가
    private function freegroup() {
        $this->load->view('product/excel/freegroup');
    }
    
    // 소셜 옵션추가
    private function social() {
        $this->load->view('product/excel/social');
    }    
    
    // 상품 가격변경
    private function price() {
        $this->load->view('product/excel/price');
    }
  
    private function test() {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel = PHPExcel_IOFactory::load('/usr/share/nginx/html/SmartPlus/upload/phpexceltest.xlsx');
        $sheetsCount = $objPHPExcel->getSheetCount();
        
        for($i=0; $i<$sheetsCount; $i++)
        {
            $objPHPExcel->setActiveSheetIndex($i);
            $sheet = $objPHPExcel->getActiveSheet();
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
        
            /* 한줄읽기 */
            for ($row = 1; $row <= $highestRow; $row++)
            {
                /* $rowData가 한줄의 데이터를 셀별로 배열처리 됩니다. */
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                
                var_dump($rowData);
            }
        }
    }
    
    private function parser() {
        $parserType = $this->input->post('parser', true);
        
        if ( $_FILES['files']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $_FILES['files']['type'] == 'application/vnd.ms-excel' ) {
            $fileName = $_FILES['files']['tmp_name'];
            
            $objPHPExcel = new PHPExcel();
            $objPHPExcel = PHPExcel_IOFactory::load($fileName);
            $sheetsCount = $objPHPExcel->getSheetCount();
            
            //그룹키 생성            
            $GroupId = sprintf('%s.%s%.08d', date('Ymd.His'), substr(microtime(), 2, 6), rand(0, 99));
            
            for($i=0; $i<$sheetsCount; $i++)
            {
                $objPHPExcel->setActiveSheetIndex($i);
                $sheet = $objPHPExcel->getActiveSheet();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
            
                for ($row = 1; $row <= $highestRow; $row++)
                {
                    if ( $row == 1 ) continue; // 첫번째 로우는 헤더
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                    
                    if ( $parserType == 'single' ) {
                        $map = $this->excelservice->singleValidation($GroupId, $rowData[0]);
                        $this->excelservice->singleParser($this->excel_m, $map);                        
                    } else if ( $parserType == 'package' ) {
                        $map = $this->excelservice->packageValidation($GroupId, $rowData[0]);
                        $this->excelservice->packageParser($this->excel_m, $map);
                    } else if ( $parserType == 'free') {
                        $map = $this->excelservice->freeValidation($GroupId, $rowData[0]);
                        $this->excelservice->freeParser($this->excel_m, $map);
                    } else if ( $parserType == 'free-group' ) {
                        $map = $this->excelservice->freeGroupValidation($GroupId, $rowData[0]);
                        $this->excelservice->freeGroupParser($this->excel_m, $map);
                    } else if ( $parserType == 'social' ) {
                        $map = $this->excelservice->socialValidation($GroupId, $rowData[0]);
                        $this->excelservice->socialParser($this->excel_m, $map);
                    } else if ( $parserType == 'chnl' ) {
                        $map = $this->excelservice->chnlValidation($GroupId, $rowData[0]);
                        $this->excelservice->chnlParser($this->excel_m, $map);
                    } else if ( $parserType == 'price' ) {
                        $map = $this->excelservice->priceValidation($GroupId, $rowData[0]);
                        $this->excelservice->priceParser($this->excel_m, $map);
                    }
                }
            }
            
            //업로드 결과내역 출력
            $this->load->view('product/excel/confirm', array( "groupKey" => $GroupId, "parserType" => $parserType ));
        }
    }
    
    private function ajax() {
        $this->excelservice->accountInfo($this->excel_m);
    }
    
    private function result() {
        $this->load->view('product/excel/result');
    }
    
    private function info() {
        phpinfo();
    }    
    
	private function error() {
	   /**
	    * 잘못된 경로로 접근하셨습니다.
	    */
	}
}
