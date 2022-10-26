<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination {

	function generate_pagination($url,$cantidad,$total,$segment=5,$sufijo=""){
		$config['suffix'] = $sufijo;
		$config['first_url'] = $url.$sufijo;
		$config['base_url'] = $url;
		$config['total_rows'] = $total;
		$config['per_page'] = $cantidad;
		$config['num_links'] = 6;
		$config['use_page_numbers'] = false;
		$config['next_link'] = '&rarr;';
		$config['prev_link'] = '&larr;';
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] = '&larr; Primera';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Última &rarr;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#" onclick="return false">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['uri_segment'] = $segment;
		$this->initialize($config);
		return $this->create_links();
	}
}