<?php
App::uses('AppModel', 'Model');
//App::uses('AttachmentBehavior', 'Uploader.Model/Behavior');
/**
 * Upload Model
 *
 * @property Copia $Copia
 */
class Upload extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	/**
	 * Validation for default forms. Testing to make sure it combines with FileValidation.
	 *
	 * @access public
	 * @var array
	 */

	public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'path' => '{ROOT}{DS}webroot{DS}files{DS}uploads{DS}',
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
            'thumbnailMethod'=>'php',
            'thumbnailSizes' => array(
                   'thumb' => '80x80'
            ),
                'deleteOnUpdate'=> true,
                'deleteFolderOnUpdate'=> true
            )
        )
    );
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Copia' => array(
			'className' => 'Copia',
			'foreignKey' => 'upload_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function beforeSave($options = array()) {
		$pedido = $this->data["Upload"]["pedido_id"];
	  //$this->Behaviors->Upload->settings["Upload"]["photo"]["path"] = "/wamp/www/laboratorio/app/webroot/files/pedidos/".$pedido."/";
		//$this->Behaviors->Upload->settings["Upload"]["photo"]["thumbnailPath"] = "/wamp/www/laboratorio/app/webroot/files/thumbs/".$pedido."/";
		$this->Behaviors->Upload->settings["Upload"]["photo"]["path"] = "/wamp/www/laboratorio/app/webroot/files/pedidos/".$pedido."/";
		$this->Behaviors->Upload->settings["Upload"]["photo"]["thumbnailPath"] = "/wamp/www/laboratorio/app/webroot/files/thumbs/".$pedido."/";
		return true;
	}

}
