<?php

class AjaxController extends Controller
{
	public function actionDocuments()
	{		
		unset($_POST['email']);
		$post_count = count($_POST);
					
		if($post_count > 1){				
			if(is_file('documents/download/documents.tar')){
				unlink('documents/download/documents.tar');
			}		
			
			$filename = 'documents/download/documents.tar';
			try {
				$tarArchive = new PharData($filename);
				
				foreach($_POST as $item){
					$tarArchive->addFile('documents/'.$item);
				}
				echo CJSON::encode(array('true'=> 'download/documents.tar'));
			} catch (Exception $e) {
				print "Возникло исключение: " . $e;
			}
		}else{
			foreach($_POST as $item){
				echo CJSON::encode(array('true'=> $item));
			}
		}	
	}
	
	public function actionDocumentsemail()
	{		
		$post_email = Yii::app()->request->getPost('email');
		
		if(empty($post_email)) {
			echo CJSON::encode(array('error'=> 'Please enter your e-mail'));
		}elseif(filter_var($post_email, FILTER_VALIDATE_EMAIL)) {
					
			$mailer = new YiiMailer();
			$mailer->setFrom('chisw_info@chisw.us', 'Dowload');
			$mailer->setSubject('CHI');			
			$mailer->setView('cv');
			$mailer->setData(array('msg' => ''));
			$mailer->render();
			$mailer->IsSMTP(true);
			$mailer->setTo($post_email);
			$mailer->SMTPAuth = true;
			$mailer->Host = 'mail.ukraine.com.ua';
			$mailer->Username = 'chisw_info@chisw.us';
			$mailer->Password = 'eL533Nbd';			

			unset($_POST['email']);
			$post_count = count($_POST);
			
			if($post_count > 1){		
				if(file_exists('documents/download/documents.tar')){
					unlink('documents/download/documents.tar');
				}		
				
				$filename = 'documents/download/documents.tar';
				try {
					$tarArchive = new PharData($filename);
					
					foreach($_POST as $item){
						$tarArchive->addFile('documents/'.$item);
					}
					
					$mailer->setAttachment($filename);
				} catch (Exception $e) {
					print "Возникло исключение: " . $e;
				}
			}else{
				foreach($_POST as $item){
					$mailer->setAttachment('documents/'.$item);
				}
			}
			
			$mailer->send();
			echo CJSON::encode(array('true'=> 'Thank you, the document has been sent to your e-mail ('. $post_email .').'));	
				
		}else{
			echo CJSON::encode(array('error'=> 'Your e-mail seems to be wrong. Please check it.'));
		}	
	}
}


