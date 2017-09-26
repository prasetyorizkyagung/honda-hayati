<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
 
 function index()
 {
  $this->load->model("excel_export_model");
  $data["export"] = $this->excel_export_model->fetch_data();
  $this->load->view("excel_export_view", $data);
 }

 function action()
 {
  $this->load->model("excel_export_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("ID", "NAMA KONSUMEN", "PLAT NOMOR", "NO TELP", "NAMA MOTOR","JENIS SERVICE","TANGGAL BOOKING","JAM BOOKING");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $export = $this->excel_export_model->fetch_data();

  $excel_row = 2;

  foreach($export as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama_konsumen);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->plat_nomor);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->no_telp);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->nama_mtr);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->jenis_service);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->tgl_booking);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->jam_booking);
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Laporan Harian Booking.xls"');
  $object_writer->save('php://output');
 }

 
 
}
