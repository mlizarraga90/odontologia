<?php
require "sms/vendor/autoload.php";
use telesign\sdk\messaging\MessagingClient;
class AgendaAdmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','global','codegenerator'));
		$this->load->model(array('consultorios_model','horario_model','citas_model'));
		$this->api_key="19/MSeDELlwipRCtTRx99J4EqjpDtKUN+moE/6w9Dls3f5zk0W10CJfb16jgb/HdD7h1lbcF1NntNoWQD+D9kw==";
		$this->customer_id="B024CB1F-9C66-420A-816A-DBFBACDF23F3";
	}
	function index(){
		$data['jsFile']=base_url().'assets/js/catalogos/agendas.js';
		$data['consultorios']=$this->consultorios_model->getAll();
		
		$this->load->view('catalogos/agenda',$data);
	}
	function getHorarioDiaSemana(){

	}
	function setDate(){
		if(isset($_POST['motivo']) && $_POST['motivo']!=""){
			$this->cancelarCita();
		}else{
			date_default_timezone_set('America/Mazatlan');
			setlocale(LC_TIME,"es_MX");
			$horaActual=strftime("%H:%M");

			$horarioDia=$this->horario_model->getHorarioDiaConsul(date('N',strtotime(returnDatFormatMysqlll($_POST['fechaCita']))),$_POST['idConsultorio']);
			if( isset($horarioDia[0]->horaInicia) ){//Si hay horario en el día seleccionado
				if( validarHoraDisponible($_POST['horaInicio'],$horarioDia)==1){
					if((int)date('N',strtotime(date('Y-m-d'))) != (int)$horarioDia[0]->dia){
						$message=array('status'=>-1,'message'=>"Favor de verificar el número celular y/o Nombre",'type'=>'error');
						$id=(int)$_POST['idCita'];
						$_POST['motivoCancelacion']=$_POST['motivo'];
						unset($_POST['motivo']);
						unset($_POST['idCita']);
						$fecha="";
						$horaI="";
						$horaF="";
						$status=$_POST['status'];
						if($_POST['nombre']!="" && $_POST['celular']!=""){
							if($id>0){
								if(isset($_POST['status']) && (int) $_POST['status']==0 || isset($_POST['status']) && (int) $_POST['status']==2 || isset($_POST['status']) && (int) $_POST['status']==-1){
										$fecha=$_POST['fechaCita'];
										$horaI=$_POST['horaInicio'];
										$horaF=$_POST['horaFin'];
										unset($_POST['horaInicio']);
										unset($_POST['horaFin']);
										unset($_POST['fechaCita']);
								}
								if($_POST['status']==-1)
									unset($_POST['status']);

								if($this->citas_model->update($_POST,$id)>=0){
									if(isset($status) && (int) $status==0){
										if($_POST['status']!=-1){
											$message="Se ha cancelado la cita del ".$fecha.' de '.$horaI.' '.$horaF;
											$this->sendMessageCell($_POST['nombre'],$_POST['celular'],$message);		
											$message=array('status'=>1,'message'=>'Se ha enviado una notificación a tu celular','type'=>'success');
										}else{
											$message=array('status'=>1,'message'=>'Se han actualizado los datos','type'=>'success');
										}
										
										

									}else{
										if($status!=-1){
											$message=array('status'=>1,'message'=>'Se ha marcado la cita como terminada','type'=>'success');
										}else{
											$message=array('status'=>1,'message'=>'Se han actualizado los datos','type'=>'success');	
										}
									}
								}
							}else{
								
								if($_POST['idConsultorio']==-1){
									$message=array('status'=>-2,'message'=>'Favor de indicar un consultorio','type'=>'error');
									echo json_encode($message); 
									return false;
								}
								$message=array('status'=>-1,'message'=>"Favor de verificar el número celular y/o Nombre",'type'=>'error');
								$_POST['status']=1;
								$_POST['fechaCita']=returnDatFormatMysqlll($_POST['fechaCita']);
								$_POST['ip']=get_client_ip_env();
								$_POST['codigo']=getRandomCode();
								$existeCita=$this->citas_model->existeCita($_POST['horaInicio'],$_POST['horaFin'],$_POST['fechaCita']);
								if(isset($existeCita[0]->id)){
									$message=array('status'=>-2,'message'=>'La fecha no se encuentra disponible','type'=>'error');
								}else{
									$id=$this->citas_model->add($_POST);
									if((int) $id['idCita']>0){
										$message="Se ha agendado una cita que inicia el ".$_POST['fechaCita'].' de '.$_POST['horaInicio'].' '.$_POST['horaFin'].', codigo cancelación:'.$_POST['codigo'];
										$this->sendMessageCell($_POST['nombre'],$_POST['celular'],$message);
										$message=array('status'=>1,'message'=>'Se ha enviado una notificación a tu celular','type'=>'success');
									}else{
										$message=array('status'=>-11,'message'=>'No fue posible guardar la cita','type'=>'error');
									}
								}
								
							}
							$message=array_merge($message,array('idCita'=>$id['idCita'],'idPaciente'=>$id['idPaciente'],'statusCita'=>$status));

						}
					}else{
						if( /*strtotime($_POST['horaInicio'])>= strtotime($horaActual)*/true){
							$message=array('status'=>-1,'message'=>"Favor de verificar el número celular y/o Nombre",'type'=>'error');
							$id=(int)$_POST['idCita'];
							$_POST['motivoCancelacion']=$_POST['motivo'];
							unset($_POST['motivo']);
							unset($_POST['idCita']);
							$fecha="";
							$horaI="";
							$horaF="";
							$status=$_POST['status'];
							//print_r($_POST);
							//die();
							if($_POST['nombre']!="" && $_POST['celular']!=""){
								if($id>0){
									if(isset($_POST['status']) && (int) $_POST['status']==0 || isset($_POST['status']) && (int) $_POST['status']==2 || isset($_POST['status']) && (int) $_POST['status']==-1){
											$fecha=$_POST['fechaCita'];
											$horaI=$_POST['horaInicio'];
											$horaF=$_POST['horaFin'];
											unset($_POST['horaInicio']);
											unset($_POST['horaFin']);
											unset($_POST['fechaCita']);
									}
									if($_POST['status']==-1)
										unset($_POST['status']);

									if($this->citas_model->update($_POST,$id)>=0){
										if(isset($status) && (int) $status==0){
											if($_POST['status']!=-1){
												$message="Se ha cancelado la cita del ".$fecha.' de '.$horaI.' '.$horaF;
												$this->sendMessageCell($_POST['nombre'],$_POST['celular'],$message);		
												$message=array('status'=>1,'message'=>'Se ha enviado una notificación a tu celular','type'=>'success');
											}else{
												$message=array('status'=>1,'message'=>'Se han actualizado los datos','type'=>'success');
											}
											
											

										}else{
											if($status!=-1){
												$message=array('status'=>1,'message'=>'Se ha marcado la cita como terminada','type'=>'success');
											}else{
												$message=array('status'=>1,'message'=>'Se han actualizado los datos','type'=>'success');	
											}
										}
									}
								}else{
									
									if($_POST['idConsultorio']==-1){
										$message=array('status'=>-2,'message'=>'Favor de indicar un consultorio','type'=>'error');
										echo json_encode($message); 
										return false;
									}
									$message=array('status'=>-1,'message'=>"Favor de verificar el número celular y/o Nombre",'type'=>'error');
									$_POST['status']=1;
									$_POST['fechaCita']=returnDatFormatMysqlll($_POST['fechaCita']);
									$_POST['ip']=get_client_ip_env();
									$_POST['codigo']=getRandomCode();
									$existeCita=$this->citas_model->existeCita($_POST['horaInicio'],$_POST['horaFin'],$_POST['fechaCita']);
									if(isset($existeCita[0]->id)){
										$message=array('status'=>-2,'message'=>'La fecha no se encuentra disponible','type'=>'error');
									}else{
										$id=$this->citas_model->add($_POST);
										if((int) $id['idCita']>0){
											$message="Se ha agendado una cita que inicia el ".$_POST['fechaCita'].' de '.$_POST['horaInicio'].' '.$_POST['horaFin'].', codigo cancelación:'.$_POST['codigo'];
											$this->sendMessageCell($_POST['nombre'],$_POST['celular'],$message);
											$message=array('status'=>1,'message'=>'Se ha enviado una notificación a tu celular','type'=>'success');
										}else{
											$message=array('status'=>-11,'message'=>'No fue posible guardar la cita','type'=>'error');
										}
									}
									
								}
								$message=array_merge($message,array('idCita'=>$id['idCita'],'idPaciente'=>$id['idPaciente'],'statusCita'=>$status));

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
	}
	function sendMessageCell($nombre,$cel,$message){
		$phone_number = "52".$cel;
		$message = "Estimado ".$nombre.', '.$message;
		$message_type = "ARN";
		$messaging = new MessagingClient($this->customer_id, $this->api_key);
		$response = $messaging->message($phone_number, $message, $message_type);
	}
	function getCitas($consultorio,$status){
		echo json_encode($this->citas_model->getCitasWebAdmin($consultorio,$status));

	}
	function cancelarCita(){
		$message=array('status'=>-1,'message'=>"No fue posible cancelar la cita",'type'=>'error');
		
		if(!isset($_POST['motivo']) || $_POST['motivo']==""){
			$message=array('status'=>-1,'message'=>"Favor de asignar el motivo de cancelacion",'type'=>'error');
			echo json_encode($message);
			return;
		}
		if($this->citas_model->cancelarCitaAdmin(array('status'=>0,'motivoCancelacion'=>$_POST['motivo'],'cancelPorPaciente'=>1),$_POST['idCita'])>0){
			$this->sendMessageCell($_POST['nombre'],$_POST['celular'],"Se ha cancelado tu cita");
			$message=array('status'=>1,'message'=>"Se ha cancelado la cita con exíto",'type'=>'success');
		}
		else
			$message=array('status'=>-1,'message'=>"El código proporcionado el erroneo",'type'=>'success');
		echo json_encode($message);
		
	}
}
?>