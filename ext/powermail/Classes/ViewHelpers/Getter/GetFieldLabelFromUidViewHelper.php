<?php

/**
 * Read Label of a field from given UID
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class Tx_Powermail_ViewHelpers_Getter_GetFieldLabelFromUidViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * fieldsRepository
	 *
	 * @var Tx_Powermail_Domain_Repository_FieldsRepository
	 */
	protected $fieldsRepository;

	/**
	 * Read Label of a field from given UID
	 *
	 * @param int $uid
	 * @return string Label
	 */
	public function render($uid) {
		$field = $this->fieldsRepository->findByUid($uid);
		if (method_exists($field, 'getTitle')) {
			return $field->getTitle();
		}
		return '';
	}

	/**
	 * injectFieldsRepository
	 *
	 * @param Tx_Powermail_Domain_Repository_FieldsRepository $fieldsRepository
	 * @return void
	 */
	public function injectFieldsRepository(Tx_Powermail_Domain_Repository_FieldsRepository $fieldsRepository) {
		$this->fieldsRepository = $fieldsRepository;
	}
}