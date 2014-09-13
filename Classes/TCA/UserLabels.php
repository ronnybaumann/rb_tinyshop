<?php 
namespace RB\RbTinyshop\TCA;

class UserLabels implements \TYPO3\CMS\Core\SingletonInterface {
	
	public function orderLabel(&$parameters, $parentObject) {
		$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
		$user = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('fe_users', $record['feuser']);
		$userBillingAddress = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_rbtinyshop_domain_model_address', $user['tx_rbtinyshop_domain_model_user_billingaddress']);
		
		$label = date('d.m.Y H:i:s', $record['crdate']);
		$label .= ' | ' . $userBillingAddress['firstname'] . ' ' . $userBillingAddress['lastname'];
		
		if ($record['payment'] != '') {
			$label .= ' | ' . $record['payment'];
		}
		
		if ($record['shipping'] != '') {
			$label .= ' | ' . $record['shipping'];
		}
		
		$label .= ' | ' . $record['total'];
		
		$parameters['title'] =  $label;
	}
}