<?php
require_once 'connect.php';


$td = strtotime('today');
$today = date("d/m/Y"); 
$date_array=explode('/',$today);
$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

$hrstd10 = $td+36000;
$hrstd9 = $td+43200;
$hrstd8 = $td+50400;
$hrstd5 = $td+57600;


$yesterday =  date("d/m/Y", $date-86400); 
$date_array_yt=explode('/',$yesterday);
$date_yt=strtotime($date_array_yt[2].'-'.$date_array_yt[1].'-'.$date_array_yt[0].'-00');

$yt = strtotime('yesterday');
$hrsyt10 = $yt+34200;
$hrsyt9 = $yt+41400;
$hrsyt8 = $yt+48600;
$hrsyt5 = $yt+55800;

$tomorrow =  date("d/m/Y", $date+86400); 
$date_array_tm=explode('/',$tomorrow);
$date_tm=strtotime($date_array_tm[2].'-'.$date_array_tm[1].'-'.$date_array_tm[0].'-00');

$tm = strtotime('tomorrow');
$hrstm9 = $tm+39600;
$hrstm8 = $tm+46800;
$hrstm7 = $tm+54000;
$hrstm6 = $tm+61210;


$sql = "UPDATE excel SET data_servico= $date_yt,staff ='Demo',hrs= $hrsyt10, servico='Chegada',voo='FE-741',nome_cl='Victor Pedro',local_recolha='Faro Aeroporto',local_entrega='Lagoa',ponto_referencia='',px='2',cr='',bebe='2',obs='Cadeira Bebe 2x',operador='Direto',estado='Fechado',cobrar_direto='20',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='4',cmx_op='',ticket='',cobrar_operador='' WHERE id=  8602;";

$sql .= "UPDATE excel SET data_servico= $date_yt,staff ='Demo',hrs= $hrsyt9, servico='Partida',voo='GT-420',nome_cl='Marlene Jacque',local_recolha='Alcantarilha',local_entrega='Faro Aeroporto',ponto_referencia='',px='4',cr='',bebe='1',obs='Cadeira Bebe 1x',operador='Direto',estado='Fechado',cobrar_direto='30',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='6',cmx_op='',ticket='',cobrar_operador='' WHERE id=  8322;";

$sql .= "UPDATE excel SET data_servico= $date_yt,staff ='Demo',hrs= $hrsyt8, servico='Golf',voo='',nome_cl='Jaime Pinto',local_recolha='Fereiras',local_entrega='Golf Penina',ponto_referencia='Estação Auto',px='2',cr='',bebe='',obs='3x Sacos Grandes',operador='Direto',estado='Fechado',cobrar_direto='50',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='10',cmx_op='',ticket='',cobrar_operador='' WHERE id=  8123;";

$sql .= "UPDATE excel SET data_servico= $date_yt,staff ='Demo',hrs= $hrsyt5, servico='Partida',voo='TT-899',nome_cl='Carlos Andrade',local_recolha='Olhão',local_entrega='Faro Aeroporto',ponto_referencia='',px='2',cr='',bebe='',obs='',operador='Direto',estado='Fechado',cobrar_direto='50',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='10',cmx_op='',ticket='',cobrar_operador='' WHERE id=  8122;";

$sql .= "UPDATE excel SET data_servico= $date,staff ='Demo',hrs= $hrstd10, servico='Chegada',voo='FE-450',nome_cl='Joao Victor',local_recolha='Faro Aeroporto',local_entrega='Lagos',ponto_referencia='Largo Gil Eanes',px='3',cr='',bebe='1',obs='Cadeira Bebe 1x',operador='Direto',estado='Aguarda',cobrar_direto='20',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='',cmx_op='',ticket='',cobrar_operador='' WHERE id=  8341;";

$sql .= "UPDATE excel SET data_servico=$date,staff ='Demo',hrs= $hrstd9,servico='Partida',voo='FF-512',nome_cl='Manuel Jose',local_recolha='Guia Shopping',local_entrega='Faro Aeroporto',ponto_referencia='',px='4',cr='',bebe='', obs='Na loja Y',operador='Direto',estado='Aguarda',cobrar_direto='29',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='',cmx_op='',ticket='',cobrar_operador='' WHERE id= 8919;";

$sql .= "UPDATE excel SET data_servico=$date,staff ='Demo',hrs= $hrstd5 ,servico='Chegada',voo='YU-4560',nome_cl='Vitor Manuel',local_recolha='Faro Aeroporto',local_entrega='Ferragudo',ponto_referencia='',px='6',cr='',bebe='', obs='',operador='Direto',estado='Aguarda',cobrar_direto='46',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='',cmx_op='',ticket='',cobrar_operador='' WHERE id= 8895;";

$sql .= "UPDATE excel SET data_servico=$date_tm,staff ='Demo',hrs= $hrstm9 ,servico='Golf',voo='',nome_cl='Carla Fernandes',local_recolha='Albufeira ',local_entrega='Golf Penina',ponto_referencia='',px='2',cr='',bebe='', obs='',operador='Aoperador',estado='Aguarda',cobrar_direto='',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='',cmx_op='',ticket='',cobrar_operador='52' WHERE id= 8967;";

$sql .= "UPDATE excel SET data_servico=$date_tm,staff ='Demo',hrs= $hrstm8 ,servico='Partida',voo='AQ-112',nome_cl='Jorge Jesus',local_recolha='Albufeira ',local_entrega='Lisboa Aeroporto',ponto_referencia='',px='2',cr='',bebe='', obs='',operador='Aoperador',estado='Aguarda',cobrar_direto='',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='',cmx_op='',ticket='',cobrar_operador='250' WHERE id= 8313;";

$sql .= "UPDATE excel SET data_servico=$date_tm,staff ='Demo',hrs= $hrstm7 ,servico='Partida',voo='FV-128',nome_cl='John Phelps',local_recolha='Albufeira ',local_entrega='Lisboa Aeroporto',ponto_referencia='',px='3',cr='2',bebe='2', obs='Cadeira Bebe 2x ',operador='Direto',estado='Aguarda',cobrar_direto='41',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='',cmx_op='',ticket='',cobrar_operador='' WHERE id= 8884;";

$sql .= "UPDATE excel SET data_servico=$date_tm,staff ='Demo',hrs= $hrstm6 ,servico='Golf',voo='',nome_cl='Jane Lovenholm',local_recolha='Albufeira ',local_entrega='Oceanico Faldo Golf',ponto_referencia='',px='5',cr='',bebe='', obs='Confirmar hora retorno',operador='Direto',estado='Aguarda',cobrar_direto='18',rec_ope='Não',rec_staf='Não',pag_ope='Não',pag_staf='Não',matricula='AA7812',cmx_st='',cmx_op='',ticket='',cobrar_operador='' WHERE id= 8121";


if (mysqli_multi_query($conn,$sql))
{
  do
    {
    if ($result=mysqli_store_result($conn)) {
      while ($row=mysqli_fetch_row($result))
        {
        printf("%s\n",$row[0]);
        }
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($conn));
}


mysqli_close($conn);

?>