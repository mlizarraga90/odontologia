<?php
require "sms/vendor/autoload.php";
use telesign\sdk\messaging\MessagingClient;
class Agenda extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','codegenerator'));
		$this->load->database();
		$this->load->model(array('horario_model','consultorios_model','citas_model'));
		$this->load->helper('global');
		$this->api_key="19/MSeDELlwipRCtTRx99J4EqjpDtKUN+moE/6w9Dls3f5zk0W10CJfb16jgb/HdD7h1lbcF1NntNoWQD+D9kw==";
		$this->customer_id="B024CB1F-9C66-420A-816A-DBFBACDF23F3";
	}
	function index (){
		$data['consultorios']=$this->consultorios_model->getAll();
		$this->load->view('agenda',$data);
	}
	function getHorario(){
		if($_POST['idConsultorio']>0){
		$data['diasAbiertos']=$this->horario_model->getHorarioTrabajo($_POST['idConsultorio']);
		$data['diasCerrados']=$this->horario_model->getDiasCerrado($_POST['idConsultorio']);
		$data['minHour']=$this->horario_model->getHoraMinima($_POST['idConsultorio']);
		$data['maxHour']=$this->horario_model->getHoraMaxima($_POST['idConsultorio']);
		echo json_encode($data);
		}
	}

	function setDate(){
		
		date_default_timezone_set('America/Mazatlan');
		setlocale(LC_TIME,"es_MX");
		$horaActual=strftime("%H:%M");
		$horarioDia=$this->horario_model->getHorarioDiaConsul(date('N',strtotime(returnDatFormatMysqlll($_POST['fechaCita']))),$_POST['idConsultorio']);
		if( isset($horarioDia[0]->horaInicia) ){//Si hay horario en el día seleccionado
			if( validarHoraDisponible($_POST['horaInicio'],$horarioDia)==1){
					//echo (int)date('N',strtotime(date('Y-m-d'))).'!='.(int)$horarioDia[0]->dia;
					if((int)date('N',strtotime(date('Y-m-d'))) != (int)$horarioDia[0]->dia){
						$message=array('status'=>-1,'message'=>"Favor de verificar el número celular y/o Nombre",'type'=>'error');
						if($_POST['nombre']!="" && $_POST['celular']!=""){
							$_POST['fechaCita']=returnDatFormatMysqlll($_POST['fechaCita']);
							$_POST['ip']=get_client_ip_env();

							if($_POST['idConsultorio']==-1){
								$message=array('status'=>-2,'message'=>'Favor de indicar un consultorio','type'=>'error');

							} else {
								$existeCita=$this->citas_model->existeCita($_POST['horaInicio'],$_POST['horaFin'],$_POST['fechaCita']);
								if(isset($existeCita[0]->id)){
									$message=array('status'=>-2,'message'=>'La fecha no se encuentra disponible','type'=>'error');
								}else{
									$_POST['codigo']=getRandomCode();

									$idConsulta=$this->citas_model->add($_POST);
									$nombreConsultorio=$this->consultorios_model->getInfoById($_POST['idConsultorio']);
									$text="Se agendó la cita para el ".$_POST['fechaCita'].' de '.$_POST['horaInicio'].' a '.$_POST['horaFin'].' en el consultorio '.' '.$nombreConsultorio[0]->descripcion.' Codigo:'.' '.$_POST['codigo'];
									$this->sendMessageCell($_POST['nombre'],$_POST['celular'],$text);
									$message=array('status'=>1,'message'=>'Se ha enviado una notificación a tu celular','idCita'=>$idConsulta['idCita'],'type'=>'success');
								}
							}
						}
					}else{
						if( strtotime($_POST['horaInicio'])>= strtotime($horaActual)){
							$message=array('status'=>-1,'message'=>"Favor de verificar el número celular y/o Nombre",'type'=>'error');
							if($_POST['nombre']!="" && $_POST['celular']!=""){
								$_POST['fechaCita']=returnDatFormatMysqlll($_POST['fechaCita']);
								$_POST['ip']=get_client_ip_env();

								if($_POST['idConsultorio']==-1){
									$message=array('status'=>-2,'message'=>'Favor de indicar un consultorio','type'=>'error');

								} else {
									$existeCita=$this->citas_model->existeCita($_POST['horaInicio'],$_POST['horaFin'],$_POST['fechaCita']);
									if(isset($existeCita[0]->id)){
										$message=array('status'=>-2,'message'=>'La fecha no se encuentra disponible','type'=>'error');
									}else{
										$_POST['codigo']=getRandomCode();
										$idConsulta=$this->citas_model->add($_POST);
										$nombreConsultorio=$this->consultorios_model->getInfoById($_POST['idConsultorio']);
										$text="Se agendó la cita para el ".$_POST['fechaCita'].' de '.$_POST['horaInicio'].' a '.$_POST['horaFin'].' en el consultorio '.' '.$nombreConsultorio[0]->descripcion.' Codigo:'.' '.$_POST['codigo'];
										$this->sendMessageCell($_POST['nombre'],$_POST['celular'],$text);
										$message=array('status'=>1,'message'=>'Se ha enviado una notificación a tu celular','idCita'=>$idConsulta['idCita'],'type'=>'success');
									}
								}
							}
						}else{
							$message=array('status'=>-4,'message'=>'No puedes agendar la cita en horas fuera del horario del consultorio','type'=>'error');
						}

					}
				
				
			}else{
				$message=array('status'=>-4,'message'=>'No puedes agendar la cita en horas fuera del horario del consultorio','type'=>'error');
			}
		}else{
			$message=array('status'=>-4,'message'=>'No puedes agendar la cita en horas fuera del horario del consultorio','type'=>'error');
		}
		echo json_encode($message);
	}
	
	function sendMessageCell($nombre,$cel,$message){
		$phone_number = "52".$cel;
		$message = "Estimado ".$nombre.', '.$message;
		$message_type = "ARN";
		$messaging = new MessagingClient($this->customer_id, $this->api_key);
		$response = $messaging->message($phone_number, $message, $message_type);
	}
	function getCitas($consultorio){
		echo json_encode($this->citas_model->getCitasWeb($consultorio));
	}
	function cancelarCita(){
		$message=array('status'=>-1,'message'=>"No fue posible cancelar la cita",'type'=>'error');
		if(!isset($_POST['codigo']) || $_POST['codigo']==""){
			$message=array('status'=>-1,'message'=>"Favor de asignar el codigo de seguridad",'type'=>'error');
			echo json_encode($message);
			return;
		}
		if(!isset($_POST['motivo']) || $_POST['motivo']==""){
			$message=array('status'=>-1,'message'=>"Favor de asignar el motivo de cancelacion",'type'=>'error');
			echo json_encode($message);
			return;
		}
		if($this->citas_model->cancelarCita(array('status'=>0,'motivoCancelacion'=>$_POST['motivo'],'cancelPorPaciente'=>1),$_POST['codigo'])>0)
			$message=array('status'=>1,'message'=>"Se ha cancelado la cita con exíto",'type'=>'success');
		else
			$message=array('status'=>-1,'message'=>"El código proporcionado el erroneo",'type'=>'success');
		echo json_encode($message);
		
	}
}
?>