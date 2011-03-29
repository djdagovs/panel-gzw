<?php
/*Panel-GZW is a web hosting panel for Unix/Linux platforms.
Copyright (C) 2005 - 2011  GoldZone Web - gaetan.trellu@goldzoneweb.info

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class QuotasController extends AppController {

	/**
	 * Controller Name
	 * @access public
	 * @var string
	 */
	var $name = 'Quotas';

	/**
	 * Helpers that are used in this controller
	 * @access public
	 * @var array
	 */
	var $helpers = array('Html', 'Form');

	/**
	 * This function display a quotas list.
	 * @return array
	 */
	function admin_index() {

		$this->Quota->recursive = 0;

		/**
		 * Put all quotas in "quotas".
		 * $quotas will be available in the view.
		 */
		$this->set('quotas', $this->paginate());

	}

	/**
	 * This function allow an administrator to add a quota for an offer.
	 * @return array
	 */
	function admin_add() {

		if (!empty($this->data)) {

			$this->Quota->create();

			/**
			 * Save new quota.
			 */
			if ($this->Quota->save($this->data)) {

				/**
				 * If the new quota is saved, a success message is displayed.
				 * Redirect to the index page.
				 */
				$this->Session->setFlash(__d('core', 'The quotas has been saved successfully.', true));
				$this->redirect(array('controller' => 'offers', 'action'=>'index'));
				
			} else {
				/**
				 * If the quota is not saved, an error message is displayed.
				 */
				$this->Session->setFlash(__d('core', 'The quotas can\'t be saved.', true), 'default', array('class' => 'error'));
			}
		}

		/**
		 * Select all offers 
		 * @var array
		 */
		$offers = $this->Quota->Offer->find('list');

		/**
		 * Put all offers in "offers".
		 * $offers will be available in the view.
		 */
		$this->set(compact('offers'));

	}

	/**
	 * This function allow an administrator to edit a quota.
	 * @param var $id
	 * @return array
	 */
	function admin_edit($id = null) {

		/**
		 * If $id is not set and $this->data is empty, an error message is displayed.
		 * $this->data = Datas from the form
		 * $id = The quota ID
		 */
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__d('core', 'Invalid quotas.', true), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->data)) {

			if ($this->Quota->save($this->data)) {

				/**
				 * If the quota is edited, a success message is displayed.
				 * Redirect to the index page.
				 */
				$this->Session->setFlash(__d('core', 'The quotas has been edited successfully.', true));
				$this->redirect(array('controller' => 'offers', 'action'=>'index'));

			} else {
				/**
				 * If the quota is not edited, an error message is displayed.
				 */
				$this->Session->setFlash(__d('core', 'The quotas has not been saved.', true), 'default', array('class' => 'error'));
			}
		}

		/**
		 * Display datas.
		 */
		if (empty($this->data)) {
			$this->data = $this->Quota->read(null, $id);
		}

		/**
		 * Select all offers 
		 * @var array
		 */
		$offers = $this->Quota->Offer->find('list');

		/**
		 * Put all offers in "offers".
		 * $offers will be available in the view.
		 */
		$this->set(compact('offers'));

	}

	/**
	 * This function delete a quota by ID.
	 * @param var $id
	 * @return array
	 */
	function admin_delete($id = null) {

		/**
		 * If $id is not set an error message is displayed.
		 * $id = The quota ID
		 */
		if (!$id) {
			$this->Session->setFlash(__d('core', 'Invalid quotas.', true), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}

		/**
		 * Delete the quota.
		 * Redirect the user to index page.
		 */
		if ($this->Quota->del($id)) {
			$this->Session->setFlash(__d('core', 'The quotas has been deleted.', true));
			$this->redirect(array('action' => 'index'));
		}
		
	}

}

?>