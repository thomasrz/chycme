<?php
// $Id$
/**
 * @file
 * Menu callback item for add/remove single brochure page functionality
 */
function chycme_get_cheque_info() {
  $order_id = $_REQUEST['order_id'];
  $order = uc_order_load($order_id);
  $cheque_info .= '<div class="pagamento-cheque-info">';
  $cheque_info .= "<div class='cheque-info-nome'>Nome: ". $order->cheque_info_nome_completo .'</div>'; 
  $cheque_info .= "<div class='cheque-info-cpf'>CPF: ". $order->cheque_info_cpf_cnpj .'</div>'; 
  $cheque_info .= "<div class='cheque-info-num-cheque'>Num. Cheque: ". $order->cheque_info_num_cheque .'</div>'; 
  $cheque_info .= "<div class='cheque-info-banco'>Banco: ". $order->cheque_info_banco .'</div>';
  $cheque_info .= "<div class='cheque-info-agencia'>Agencia: ". $order->cheque_info_agencia .'</div>';
  $cheque_info .= "<div class='cheque-info-conta'>Conta: ". $order->cheque_info_num_conta .'</div>';
  $cheque_info .= "<div class='cheque-info-telefone'>Telefone: ". $order->cheque_info_telefone .'</div>';
  $cheque_info .= "<div class='cheque-info-cliente'>Cliente desde: ". $order->cheque_info_cliente_desde .'</div>';
  $cheque_info .= '</div>';
  print $cheque_info;
  return;
}