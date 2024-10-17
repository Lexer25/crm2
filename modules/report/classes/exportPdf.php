<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
*17.10.2024
*Класс exportPdf - Класс для создания файла csv.
*вход - массив класса Report
*выход - ссылка на подготовленный файл.
*/

class exportPdf
{
	public $template = 'template';
	public function __construct(Report $report)
	{
				//echo Debug::vars('244', unserialize(Arr::get($post, 'forsave')));exit;
				//"C:\xampp\htdocs\crm2\application\views\\report\testpdf.php"
				//echo Debug::vars('25', Kohana::find_file('views','\report\testpdf'));exit;
				if(Kohana::find_file('views','\report\testpdf'))
				{
				 $content=View::Factory('\report\testpdf'); 
				} else {
					throw new  Exception('Нет файла view!');
				}
					
				if(false){ // переключатель: true - делать экспорт в pdf, false - выводит отчет на экран браузера
				//if(true){ // переключатель: true - делать экспорт в pdf, false - выводит отчет на экран браузера
				
					require_once APPPATH . 'vendor/dompdf/autoload.inc.php';
					Dompdf\Autoloader::register();
								
					$dompdf = new Dompdf\Dompdf();
					$dompdf->setPaper("A4");				
					$dompdf->loadHtml($content, 'UTF-8');
					$dompdf->render();
					
			
					$color = array(0, 0, 0);
					$font = null;
					$size = 8;
					$text = "Стр. {PAGE_NUM} из {PAGE_COUNT}";

					$canvas = $dompdf->getCanvas();
					$pageWidth = $canvas->get_width();
					$pageHeight = $canvas->get_height();
					$width=10;
					$canvas = $dompdf->get_canvas();
					$canvas->page_text($pageWidth/2, $pageHeight - 40, $text, $font, $size, $color);
					$dompdf->stream();
				} else {
echo Debug::vars('49', $content);//exit;
						$this->template->content = $content;
				}
			
				return;
		
		
	}
	
	
	
	
	
	
	
}
